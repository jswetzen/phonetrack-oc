<?php
/**
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace OCA\PhoneTrack\Controller;

use \OCA\PhoneTrack\AppInfo\Application;

class PageNLogControllerTest extends \PHPUnit\Framework\TestCase {

    private $appName;
    private $request;
    private $contacts;

    private $container;
    private $app;

    private $pageController;
    private $pageController2;
    private $logController;

    private $testSessionToken;
    private $testSessionToken2;
    private $testSessionToken3;
    private $testSessionToken4;
    private $testSessionToken5;

    public function setUp() {
        $this->appName = 'phonetrack';
        $this->request = $this->getMockBuilder('\OCP\IRequest')
            ->disableOriginalConstructor()
            ->getMock();
        $this->contacts = $this->getMockBuilder('OCP\Contacts\IManager')
            ->disableOriginalConstructor()
            ->getMock();

        $this->app = new Application();
        $this->container = $this->app->getContainer();
        $c = $this->container;

        // CREATE DUMMY USERS
        $c->getServer()->getUserManager()->createUser('test', 'T0T0T0');
        $c->getServer()->getUserManager()->createUser('test2', 'T0T0T0');
        $c->getServer()->getUserManager()->createUser('test3', 'T0T0T0');

        $this->pageController = new PageController(
            $this->appName,
            $this->request,
            'test',
            $c->query('ServerContainer')->getUserFolder('test'),
            $c->query('ServerContainer')->getConfig(),
            $c->getServer()->getShareManager(),
            $c->getServer()->getAppManager(),
            $c->getServer()->getUserManager()
        );

        $this->pageController2 = new PageController(
            $this->appName,
            $this->request,
            'test2',
            $c->query('ServerContainer')->getUserFolder('test2'),
            $c->query('ServerContainer')->getConfig(),
            $c->getServer()->getShareManager(),
            $c->getServer()->getAppManager(),
            $c->getServer()->getUserManager()
        );

        $this->logController = new LogController(
            $this->appName,
            $this->request,
            'test',
            $c->query('ServerContainer')->getUserFolder('test'),
            $c->query('ServerContainer')->getConfig(),
            $c->getServer()->getShareManager(),
            $c->getServer()->getAppManager()
        );
    }

    public function tearDown() {
        $user = $this->container->getServer()->getUserManager()->get('test');
        $user->delete();
        $user = $this->container->getServer()->getUserManager()->get('test2');
        $user->delete();
        $user = $this->container->getServer()->getUserManager()->get('test3');
        $user->delete();
        // in case there was a failure and session was not deleted
        $this->pageController->deleteSession($this->testSessionToken);
        $this->pageController->deleteSession($this->testSessionToken2);
        $this->pageController->deleteSession($this->testSessionToken3);
        $this->pageController->deleteSession($this->testSessionToken4);
        $this->pageController->deleteSession($this->testSessionToken5);
    }

    public function testLog() {
        // CREATE SESSION
        $resp = $this->pageController->createSession('logSession');
        $data = $resp->getData();
        $token = $data['token'];
        $this->testSessionToken4 = $token;
        $done = $data['done'];
        $this->assertEquals($done, 1);

        // LOG
        $this->logController->logOsmand($token, 'dev1', 44.4, 3.33, 450, 60, 10, 200, 199);
        $this->logController->logGpsloggerGet($token, 'dev1', 44.5, 3.34, 460, 55, 10, 200, 198);
        $this->logController->logOwntracks($token, 'dev1', 'dev1', 44.6, 3.35, 197, 470, 200, 50);
        $this->logController->logUlogger($token, 'dev1', 'tid', 44.7, 3.36, 480, 200, 196, 'pwd', 'user', 'addpos');
        $this->logController->logTraccar($token, 'dev1', 'id', 44.6, 3.35, 470, 200, 195, 45);
        $gprmc = '$GPRMC,081836,A,3751.65,S,14507.36,E,000.0,360.0,130998,011.3,E*62';
        $this->logController->logOpengts($token, 'dev1', 'dev1', 'dev1', 'whateverthatis', '195', 40, $gprmc);
        $this->logController->logGpsloggerPost($token, 'dev1', 44.5, 3.34, 200, 490, 35, 10, 199);
        $this->logController->logGet($token, 'dev1', 44.5, 3.344, 499, 25, 10, 200, 198);

        // TRACK
        $sessions = array(array($token, array('dev1' => 400), array('dev1' => 1)));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $this->assertEquals(count($respSession), 1);
        foreach ($respSession[$token] as $k => $v) {
            $pointList = $v;
            $this->assertEquals(count($pointList), 8);
            $this->assertEquals($pointList[0]['batterylevel'], 60);
        }

        // STRESS LOG
        // empty sessionid
        $this->logController->logOsmand('', 'dev1', 44.4, 3.33, 450, 60, 10, 200, 199);
        $resp = $this->pageController->getSessions();
        $data = $resp->getData();
        $this->assertEquals(count($data['sessions']), 1);

        // empty lat
        $this->logController->logOsmand($token, 'dev1', '', 3.33, 450, 60, 10, 200, 199);
        $sessions = array(array($token, null, null));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $this->assertEquals(count($respSession), 1);
        foreach ($respSession[$token] as $k => $v) {
            $pointList = $v;
            $this->assertEquals(count($pointList), 8);
            $this->assertEquals($pointList[0]['batterylevel'], 60);
        }

        // empty lon
        $this->logController->logOsmand($token, 'dev1', 4.44, '', 450, 60, 10, 200, 199);
        $sessions = array(array($token, null, null));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $this->assertEquals(count($respSession), 1);
        foreach ($respSession[$token] as $k => $v) {
            $pointList = $v;
            $this->assertEquals(count($pointList), 8);
            $this->assertEquals($pointList[0]['batterylevel'], 60);
        }

        // empty timestamp
        $this->logController->logOsmand($token, 'dev1', 4.44, 3.33, '', 60, 10, 200, 199);
        $sessions = array(array($token, null, null));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $this->assertEquals(count($respSession), 1);
        foreach ($respSession[$token] as $k => $v) {
            $pointList = $v;
            $this->assertEquals(count($pointList), 8);
            $this->assertEquals($pointList[0]['batterylevel'], 60);
        }

        // empty battery, sat, acc, alt and too big timestamp
        $this->logController->logOsmand($token, 'dev1', 4.44, 3.33, 10000000001, '', '', '', '');
        $sessions = array(array($token, null, null));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $this->assertEquals(count($respSession), 1);
        foreach ($respSession[$token] as $k => $v) {
            $pointList = $v;
            $this->assertEquals(count($pointList), 9);
            $this->assertEquals($pointList[0]['batterylevel'], 60);
        }

        // empty user agent
        $this->logController->logPost($token, 'dev1', 4.44, 3.33, 100, 470, 60, 10, 200, '');
        $sessions = array(array($token, null, null));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $this->assertEquals(count($respSession), 1);
        foreach ($respSession[$token] as $k => $v) {
            $pointList = $v;
            $this->assertEquals(count($pointList), 10);
            $this->assertEquals($pointList[0]['batterylevel'], 60);
        }

        // wrong session and logGet
        $this->logController->logOsmand($token.'a', 'dev1', 44.4, 3.33, 450, 60, 10, 200, 199);
        $resp = $this->pageController->getSessions();
        $data = $resp->getData();
        $this->assertEquals(count($data['sessions']), 1);

        // CHECK NAME RESERVATION
        $resp = $this->pageController->addNameReservation($token, 'resName');
        $data = $resp->getData();
        $done = $data['done'];
        $reservToken = $data['nametoken'];
        $this->assertEquals($done, 1);

        // then try to log, number of devices should still be 1
        $this->logController->logOsmand($token, 'resName', 4.44, 3.33, 500, 60, 10, 200, 199);
        $sessions = array(array($token, null, null));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $this->assertEquals(count($respSession[$token]), 1);

        // then try to log with name token, there should be two devices
        $this->logController->logOsmand($token, $reservToken, 4.44, 3.33, 500, 60, 10, 200, 199);
        $sessions = array(array($token, null, null));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $this->assertEquals(count($respSession[$token]), 2);

        // empty deviceid => log works, device name is 'unknown'
        $this->logController->logOsmand($token, '', 44.4, 3.33, 450, 60, 10, 200, 199);
        $sessions = array(array($token, null, null));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $this->assertEquals(count($respSession), 1);
        $this->assertEquals(count($respSession[$token]), 3);

        // no device name but one tid
        $this->logController->logOwntracks($token, '', 'dev1', 44.6, 3.35, 197, 470, 200, 50);

        // no device name but one tid
        $this->logController->logPost($token, 'dev1', 44.6, 3.35, 197, 470, 200, 50, 10, 'browser');

        // GPRMC
        $gprmc = '$GPRMC,081839,A,3751.65,S,14507.36,W,000.0,360.0,130998,011.3,E*62';
        $this->logController->logOpengts($token, 'dev1', 'dev1', 'dev1', 'whateverthatis', '195', 40, $gprmc);

    }

    public function testPage() {
        // CREATE SESSION
        $resp = $this->pageController->createSession('testSession');

        $data = $resp->getData();
        $token = $data['token'];
        $this->testSessionToken = $token;
        $done = $data['done'];

        $this->assertEquals($done, 1);

        $resp = $this->pageController->createSession('otherSession');

        $data = $resp->getData();
        $token2 = $data['token'];
        $this->testSessionToken2 = $token2;
        $done = $data['done'];

        $this->assertEquals($done, 1);

        // STRESS CREATE SESSION
        $resp = $this->pageController->createSession('testSession');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);
        $resp = $this->pageController->createSession('');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);

        // SHARE SESSION
        $resp = $this->pageController->addUserShare($token, 'test3');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);
        $resp = $this->pageController->addUserShare($token, 'test2');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);

        // STRESS SHARE SESSION
        $resp = $this->pageController->addUserShare($token, 'test2doesnotexist');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 4);
        $resp = $this->pageController->addUserShare($token, '');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 4);
        $resp = $this->pageController->addUserShare('dummytoken', 'test2');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);
        $resp = $this->pageController->addUserShare('', 'test2');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);
        $resp = $this->pageController->addUserShare(null, 'test2');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);
        $resp = $this->pageController->addUserShare($token, 'test2');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);

        // UNSHARE SESSION
        $resp = $this->pageController->deleteUserShare($token, 'test3');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);

        // STRESS UNSHARE SESSION
        $resp = $this->pageController->deleteUserShare($token, 'test3');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);
        $resp = $this->pageController->deleteUserShare($token, null);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);
        $resp = $this->pageController->deleteUserShare($token, '');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);
        $resp = $this->pageController->deleteUserShare($token, 'dummy');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);
        $resp = $this->pageController->deleteUserShare('dummytoken', 'test2');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);
        $resp = $this->pageController->deleteUserShare(null, 'test2');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);
        $resp = $this->pageController->deleteUserShare('', 'test2');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);

        // ADD POINTS
        $resp = $this->pageController->addPoint($token, 'testDev', 45.5, 3.4, 111, 456, 100, 80, 12, 'tests');
        $data = $resp->getData();
        $done = $data['done'];
        $pointid = $data['pointid'];
        $deviceid = $data['deviceid'];
        $this->assertEquals($done, 1);
        $this->assertEquals(intval($pointid) > 0, True);
        $this->assertEquals(intval($deviceid) > 0, True);

        $resp = $this->pageController->addPoint($token, 'testDev', 45.6, 3.5, 200, 460, 100, 75, 14, 'tests');
        $resp = $this->pageController->addPoint($token, 'testDev', 45.7, 3.6, 220, 470, 100, 70, 11, 'tests');

        // STRESS ADD POINT
        $resp = $this->pageController->addPoint($token, '', 45.5, 3.4, 111, 456, 100, 80, 12, 'tests');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);
        $resp = $this->pageController->addPoint('', '', 45.5, 3.4, 111, 456, 100, 80, 12, 'tests');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);
        $resp = $this->pageController->addPoint('dummytoken', 'testDev', 45.5, 3.4, 111, 456, 100, 80, 12, 'tests');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);

        // GET SESSIONS
        $resp = $this->pageController->getSessions();

        $data = $resp->getData();
        $name = $data['sessions'][0][0];

        $this->assertEquals($name, 'testSession');

        // CHECK SESSION IS SHARED WITH A USER
        $cond = ($data['sessions'][0][1] === $token and count($data['sessions'][0][4]) > 0 and $data['sessions'][0][4][0] === 'test2') or
                ($data['sessions'][1][1] === $token and count($data['sessions'][1][4]) > 0 and $data['sessions'][1][4][0] === 'test2');
        $this->assertEquals($cond, True);

        // TRACK
        $sessions = array(array($token, array($deviceid => 400), array($deviceid => 1)));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $pointList = $respSession[$token][$deviceid];

        $this->assertEquals(count($pointList), 3);
        $this->assertEquals($pointList[2]['batterylevel'], 70);
        $lastPointID = $pointList[2]['id'];

        // STRESS TRACK
        $sessions = null;
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $respColors = $data['colors'];
        $respNames = $data['names'];
        $this->assertEquals(count($respSession), 0);
        $this->assertEquals(count($respColors), 0);
        $this->assertEquals(count($respNames), 0);

        $sessions = array(array('', null, null));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $respColors = $data['colors'];
        $respNames = $data['names'];
        $this->assertEquals(count($respSession), 0);
        $this->assertEquals(count($respColors), 0);
        $this->assertEquals(count($respNames), 0);

        $sessions = array(array($token, array($deviceid => 1000), array($deviceid => 1)));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $respColors = $data['colors'];
        $respNames = $data['names'];
        $this->assertEquals(count($respSession), 1);
        $this->assertEquals(count($respColors), 0);
        $this->assertEquals(count($respNames), 0);
        $this->assertEquals(count($respSession[$token]), 0);

        // UPDATE POINT
        $resp = $this->pageController->updatePoint($token, $deviceid, $lastPointID,
            45.11, 3.11, 210, 480, 99, 65, 10, 'tests_modif');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);

        // STRESS UPDATE POINT
        $resp = $this->pageController->updatePoint($token, $deviceid, 666,
            45.11, 3.11, 210, 480, 99, 65, 10, 'tests_modif');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);

        $resp = $this->pageController->updatePoint($token, 666, $lastPointID,
            45.11, 3.11, 210, 480, 99, 65, 10, 'tests_modif');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);

        $resp = $this->pageController->updatePoint('dumdum', $deviceid, $lastPointID,
            45.11, 3.11, 210, 480, 99, 65, 10, 'tests_modif');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 4);

        // TRACK AGAIN
        $sessions = array(array($token, array($deviceid => 400), array($deviceid => 1)));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $pointList = $respSession[$token][$deviceid];

        $this->assertEquals(count($pointList), 3);
        $this->assertEquals($pointList[2]['batterylevel'], 65);
        $this->assertEquals($pointList[2]['useragent'], 'tests_modif');
        $this->assertEquals($pointList[2]['accuracy'], 99);
        $this->assertEquals($pointList[2]['timestamp'], 480);
        $this->assertEquals($pointList[2]['altitude'], 210);
        $this->assertEquals($pointList[2]['satellites'], 10);

        //DELETE POINT
        $resp = $this->pageController->deletePoint($token, $deviceid, $pointid);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);

        // STRESS DELETE POINT
        $resp = $this->pageController->deletePoint($token, $deviceid, 666);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);

        $resp = $this->pageController->deletePoint($token, 666, $pointid);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);

        $resp = $this->pageController->deletePoint('dumdum', $deviceid, $pointid);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 4);

        // TRACK AFTER DELETE POINT
        $sessions = array(array($token, array($deviceid => 400), array($deviceid => 1)));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $pointList = $respSession[$token][$deviceid];

        $this->assertEquals(count($pointList), 2);

        // RENAME SESSION
        $resp = $this->pageController->renameSession($token, 'renamedTestSession');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);

        // STRESS RENAME SESSION
        $resp = $this->pageController->renameSession('dumdum', 'yeyeah');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);

        $resp = $this->pageController->renameSession($token, '');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);

        $resp = $this->pageController->renameSession($token, null);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);

        // GET SESSIONS TO CHECK NAME
        $resp = $this->pageController->getSessions();

        $data = $resp->getData();
        $name = $data['sessions'][0][0];

        $this->assertEquals($name, 'renamedTestSession');

        // RENAME DEVICE
        $resp = $this->pageController->renameDevice($token, $deviceid, 'renamedTestDev');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);

        // STRESS RENAME DEVICE
        $resp = $this->pageController->renameDevice($token, 666, 'renamedTestDev');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);

        $resp = $this->pageController->renameDevice('dumdum', $deviceid, 'renamedTestDev');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);

        $resp = $this->pageController->renameDevice($token, $deviceid, '');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 4);

        // get device name
        $sessions = array(array($token, null, null));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $respNames = $data['names'];

        $this->assertEquals($respNames[$token][$deviceid], 'renamedTestDev');

        // REAFFECT DEVICE
        $resp = $this->pageController->reaffectDevice($token, $deviceid, $token2);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);

        // STRESS REAFFECT DEVICE
        $resp = $this->pageController->reaffectDevice('dumdum', $deviceid, $token2);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);

        $resp = $this->pageController->reaffectDevice($token, 666, $token2);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 4);

        $resp = $this->pageController->reaffectDevice($token, $deviceid, 'dumdum');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 5);

        // create session with a device with same name
        $resp = $this->pageController->createSession('stressReaffect');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);
        $stressReafToken = $data['token'];
        $this->testSessionToken3 = $stressReafToken;
        $resp = $this->pageController->addPoint($stressReafToken, 'renamedTestDev', 25.6, 2.5, 100, 560, 100, 35, 4, 'testsReaf');

        $resp = $this->pageController->reaffectDevice($token2, $deviceid, $stressReafToken);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);

        $resp = $this->pageController->deleteSession($stressReafToken);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);

        // get device name to check reaffect
        $sessions = array(array($token2, null, null));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $respNames = $data['names'];

        $this->assertEquals($respNames[$token2][$deviceid], 'renamedTestDev');

        // SET DEVICE COLOR
        $resp = $this->pageController->setDeviceColor($token2, $deviceid, '#96ff00');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);

        // STRESS SET DEVICE COLOR
        $resp = $this->pageController->setDeviceColor('dumdum', $deviceid, '#96ff00');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);

        $resp = $this->pageController->setDeviceColor($token2, 666, '#96ff00');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);

        // get device color
        $sessions = array(array($token2, null, null));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $respNames = $data['names'];
        $respColors = $data['colors'];

        $this->assertEquals($respColors[$token2][$deviceid], '#96ff00');

        // TRACK PUBLIC SESSION
        // get second session's public token
        $resp = $this->pageController->getSessions();

        $data = $resp->getData();
        $sharetoken2 = null;
        foreach ($data['sessions'] as $s) {
            $name = $s[0];
            if ($name == 'otherSession') {
                $sharetoken2 = $s[2];
            }
        }
        
        $this->assertEquals(($sharetoken2 !== null), True);

        // PUBLIC VIEW TRACK
        $sessions = array(array($sharetoken2, null, null));
        $resp = $this->pageController->publicViewTrack($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $respNames = $data['names'];
        $respColors = $data['colors'];
        $pointList = $respSession[$sharetoken2][$deviceid];

        $this->assertEquals(count($pointList), 2);

        // API
        $resp = $this->pageController->APIgetLastPositions($sharetoken2);
        $data = $resp->getData();

        $this->assertEquals((count($data[$sharetoken2]) > 0), True);
        $this->assertEquals($data[$sharetoken2]['renamedTestDev']['timestamp'], 480);

        // SET SESSION PRIVATE
        $resp = $this->pageController->setSessionPublic($token2, 0);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);

        // STRESS SET SESSION PRIVATE
        $resp = $this->pageController->setSessionPublic('dumdum', 0);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);

        $resp = $this->pageController->setSessionPublic($token2, 33);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);

        // CHECK PUBLIC VIEW TRACK ON PRIVATE SESSION
        $sessions = array(array($sharetoken2, null, null));
        $resp = $this->pageController->publicViewTrack($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $respNames = $data['names'];
        $respColors = $data['colors'];

        $this->assertEquals(count($respSession), 0);

        // API
        $resp = $this->pageController->APIgetLastPositions($sharetoken2);
        $data = $resp->getData();

        $this->assertEquals((count($data) === 0), True);

        // ADD PUBLIC SHARE
        $resp = $this->pageController->addPublicShare($token2);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);
        $publictoken1 = $data['sharetoken'];
        $this->assertEquals(count($publictoken1) > 0, True);

        $resp = $this->pageController->addPublicShare($token2);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);
        $publictoken2 = $data['sharetoken'];
        $this->assertEquals(count($publictoken2) > 0, True);

        // DELETE PUBLIC SHARE
        $resp = $this->pageController->deletePublicShare($token2, $publictoken2);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);

        // CHECK PUBLIC SHARE
        $resp = $this->pageController->getSessions();

        $data = $resp->getData();
        $checkpublictoken = null;
        foreach ($data['sessions'] as $s) {
            $name = $s[0];
            if ($name == 'otherSession') {
                if (count($s[6]) > 0) {
                    $checkpublictoken = $s[6][0]['token'];
                }
            }
        }
        $this->assertEquals($checkpublictoken === $publictoken1, True);

        // PUBLIC VIEW TRACK FOR PUBLIC SHARE
        $sessions = array(array($publictoken1, null, null));
        $resp = $this->pageController->publicViewTrack($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $respNames = $data['names'];
        $respColors = $data['colors'];
        $pointList = $respSession[$publictoken1][$deviceid];

        $this->assertEquals(count($pointList), 2);

        // DELETE DEVICE
        // create a device
        $resp = $this->pageController->addPoint($token, 'delDev', 25.6, 2.5, 100, 560, 100, 35, 4, 'tests');
        $data = $resp->getData();
        $deldeviceid = $data['deviceid'];
        $resp = $this->pageController->addPoint($token, 'delDev', 25.7, 2.6, 120, 570, 100, 30, 11, 'tests');

        // get sessions to check device is there
        $sessions = array(array($token, null, null));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $respNames = $data['names'];
        $respColors = $data['colors'];

        $cond = array_key_exists($token, $data['names']) and array_key_exists($deldeviceid, $data['names'][$token]);
        $this->assertEquals($cond, True);
        $this->assertEquals($data['names'][$token][$deldeviceid], 'delDev');

        // actually delete
        $resp = $this->pageController->deleteDevice($token, $deldeviceid);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);

        // stress delete
        $resp = $this->pageController->deleteDevice('dumdum', $deldeviceid);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);
        $resp = $this->pageController->deleteDevice($token, 666);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);

        // check if the device is gone
        $sessions = array(array($token, null, null));
        $resp = $this->pageController->track($sessions);
        $data = $resp->getData();
        $respSession = $data['sessions'];
        $respNames = $data['names'];
        $respColors = $data['colors'];

        $cond = (!array_key_exists($token, $data['names'])) or (!array_key_exists($deldeviceid, $data['names'][$token]));
        $this->assertEquals($cond, True);

        // NAME RESERVATION
        $resp = $this->pageController->addNameReservation($token, 'resName');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);

        // STRESS NAME RESERVATION
        $resp = $this->pageController->addNameReservation($token, '');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 4);

        $resp = $this->pageController->addNameReservation('dumdum', 'lala');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);

        $resp = $this->pageController->addNameReservation($token, 'resName');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);

        // CHECK NAME RESERVATION
        $resp = $this->pageController->getSessions();

        $data = $resp->getData();
        $reservedList = null;
        foreach ($data['sessions'] as $s) {
            $name = $s[0];
            if ($name == 'renamedTestSession') {
                $reservedList = $s[5];
            }
        }

        $cond = ($reservedList !== null and count($reservedList) > 0 and $reservedList[0]['name'] === 'resName');
        $this->assertEquals($cond, True);

        // REMOVE NAME RESERVATION
        $resp = $this->pageController->deleteNameReservation($token, 'resName');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);

        // STRESS REMOVE NAME RESERVATION
        $resp = $this->pageController->deleteNameReservation($token, '');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 5);

        $resp = $this->pageController->deleteNameReservation('dumdum', 'resName');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 4);

        $resp = $this->pageController->deleteNameReservation($token, 'idontexist');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);

        $resp = $this->pageController->deleteNameReservation($token, 'resName');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 3);

        // CHECK REMOVE NAME RESERVATION
        $resp = $this->pageController->getSessions();

        $data = $resp->getData();
        $reservedList = null;
        foreach ($data['sessions'] as $s) {
            $name = $s[0];
            if ($name == 'renamedTestSession') {
                $reservedList = $s[5];
            }
        }

        $cond = ($reservedList !== null and count($reservedList) === 0);
        $this->assertEquals($cond, True);

        // DELETE SESSION
        $resp = $this->pageController->deleteSession($token);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);

        // STRESS DELETE SESSION
        $resp = $this->pageController->deleteSession('dumdum');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);

        $resp = $this->pageController->deleteSession(null);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);

        $resp = $this->pageController->deleteSession('');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 2);

        // CREATE SESSION for user2 and share it with user1
        $resp = $this->pageController2->createSession('super');
        $data = $resp->getData();
        $token = $data['token'];
        $this->testSessionToken5 = $token;
        $done = $data['done'];
        $this->assertEquals($done, 1);

        $resp = $this->pageController2->addUserShare($token, 'test');
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);

        $resp = $this->pageController->getSessions();
        $data = $resp->getData();
        $this->assertEquals(count($data['sessions']), 2);

        $resp = $this->pageController2->deleteSession($token);
        $data = $resp->getData();
        $done = $data['done'];
        $this->assertEquals($done, 1);
    }

}