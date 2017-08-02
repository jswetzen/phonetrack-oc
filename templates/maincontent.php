<div id="sidebar" class="sidebar">
<!-- Nav tabs -->
<ul class="sidebar-tabs" role="tablist">
<li class="active" title="<?php p($l->t('Main tab')); ?>"><a href="#ho" role="tab"><i class="fa fa-bars"></i></a></li>
<li title="<?php p($l->t('Settings and extra actions')); ?>"><a href="#gpsphonetrackingsettings" role="tab"><i class="fa fa-gear"></i></a></li>
<li title="<?php p($l->t('About GpsPhoneTracking')); ?>"><a href="#help" role="tab"><i class="fa fa-question"></i></a></li>
</ul>
<!-- Tab panes -->
<div class="sidebar-content active">
<div class="sidebar-pane active" id="ho">
    <div id="logofolder">
        <div id="logo">
            <!--p align="center"><img src="gpsphonetracking.png"/></p-->
            <div>
            <p>v
<?php
p($_['gpsphonetracking_version']);
?>
            </p>
            </div>
        </div>
    </div>
    <hr/>
    <div id="options">
        <div>
        <h3 id="optiontitle" class="sectiontitle">
        <b id="optiontitletext"><?php p($l->t('Options')); ?> </b>
        <b id="optiontoggle"><i class="fa fa-angle-double-down"></i></b></h3>
        </div>
        <div style="clear:both"></div>
        <div id="optionscontent" style="display:none;">
        <div id="optioncheckdiv">
            <div>
                <input id="autozoom" type="checkbox"/>
                <label for="autozoom"><i class="fa fa-search-plus" aria-hidden="true" style="color:blue;"></i>
                <?php p($l->t('Auto zoom'));?></label>
                <br/>
                <input id="viewmove" type="checkbox"/>
                <label for="viewmove"><i class="fa fa-line-chart" aria-hidden="true" style="color:blue;"></i>
                <?php p($l->t('View movement paths'));?></label>
                <br/>
                <input id="showtime" type="checkbox"/>
                <label for="showtime"><i class="fa fa-clock-o" aria-hidden="true" style="color:blue;"></i>
                <?php p($l->t('Show time tooltips'));?></label>
                <br/>
                <input id="animatedmarkers" type="checkbox"/>
                <label for="animatedmarkers"><i class="fa fa-map-marker fa-spin fa-3x fa-fw" aria-hidden="true" style="color:blue;font-size:11px;"></i>
                <?php p($l->t('Animate markers'));?></label>
                <br/>
                <label for="updateinterval"><i class="fa fa-refresh" aria-hidden="true" style="color:blue;"></i>
                <?php p($l->t('Refresh each (sec)'));?></label>
                <input id="updateinterval" type="number" min="0" max="1000" step="1" value="5"/>
            </div>
        </div>
        <div id="optionbuttonsdiv">
            <button id="zoombutton">
                <i class="fa fa-search-plus" style="color:blue;"></i>
                <?php p($l->t('Zoom on markers')); ?>
            </button>
        </div>
        </div>
    </div>
    <div style="clear:both"></div>
    <hr/>
    <div id="newsessiondiv">
        <label for="sessionnameinput"><?php p($l->t('Session name'));?></label>
        <input type="text" id="sessionnameinput"/>
        <button id="newsession">
            <i class="fa fa-plus-circle" aria-hidden="true" style="color:blue;"></i>
            <?php p($l->t('Create session')); ?>
        </button>
    </div>
    <div id="logmediv">
    <div id="logmesubdiv">
        <label for="logmedeviceinput"><?php p($l->t('Device name'));?></label>
        <input type="text" id="logmedeviceinput" value="1"/>
        <label for="logme"><?php p($l->t('Log my position in this session'));?></label>
        <input type="checkbox" id="logme"/>
    </div>
    </div>
    <hr/>
    <h3 id="ticv" class="sectiontitle"><?php p($l->t('Tracking sessions')); ?></h3>
    <div id="sessions">
    </div>
    <div id="loading"><p>
        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
        <?php p($l->t('loading positions')); ?>&nbsp;<b id="loadinpos"></b></p>
    </div>
<?php

echo '<p id="username" style="display:none">';
p($_['username']);
echo '</p>'."\n";
echo '<ul id="basetileservers" style="display:none">';
foreach($_['basetileservers'] as $ts){
    echo '<li';
    foreach (Array('name', 'type', 'url', 'layers', 'version', 'format', 'opacity', 'transparent', 'minzoom', 'maxzoom', 'attribution') as $field) {
        if (array_key_exists($field, $ts)) {
            echo ' '.$field.'="';
            p($ts[$field]);
            echo '"';
        }
    }
    echo '></li>';
}
echo '</ul>'."\n";

?>
</div>
<div class="sidebar-pane" id="gpsphonetrackingsettings">
<h1 class="sectiontitle"><?php p($l->t('Settings and extra actions')); ?></h1>
<hr/>
<br/>

<div id="customtilediv">
<h3 class="sectiontitle customtiletitle" for="tileserverdiv"><b><?php p($l->t('Custom tile servers')); ?></b> <i class="fa fa-angle-double-down" aria-hidden="true"></i></h3>
<div id="tileserverdiv">
    <div id="tileserveradd">
        <p><?php p($l->t('Server name')); ?> :</p>
        <input type="text" id="tileservername" title="<?php p($l->t('For example : my custom server')); ?>"/>
        <p><?php p($l->t('Server url')); ?> :</p>
        <input type="text" id="tileserverurl" title="<?php p($l->t('For example : http://tile.server.org/cycle/{z}/{x}/{y}.png')); ?>"/>
        <p><?php p($l->t('Min zoom (1-20)')); ?> :</p>
        <input type="text" id="tileminzoom" value="1"/>
        <p><?php p($l->t('Max zoom (1-20)')); ?> :</p>
        <input type="text" id="tilemaxzoom" value="18"/>
        <button id="addtileserver"><i class="fa fa-plus-circle" aria-hidden="true" style="color:green;"></i> <?php p($l->t('Add')); ?></button>
    </div>
    <div id="tileserverlist">
        <h3><?php p($l->t('Your tile servers')); ?></h3>
        <ul class="disclist">
<?php
if (count($_['usertileservers']) > 0){
    foreach($_['usertileservers'] as $ts){
        echo '<li title="'.$ts['url'].'"';
        foreach (Array('servername', 'type', 'url', 'layers', 'version', 'format', 'opacity', 'transparent', 'minzoom', 'maxzoom', 'attribution') as $field) {
            if (array_key_exists($field, $ts)) {
                echo ' '.$field.'="';
                p($ts[$field]);
                echo '"';
            }
        }
        echo '>';
        p($ts['servername']);
        echo '&nbsp <button><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i> ';
        p($l->t('Delete'));
        echo '</button></li>';
    }
}
?>
        </ul>
    </div>
</div>

<hr/>
<h3 class="sectiontitle customtiletitle" for="overlayserverdiv"><b><?php p($l->t('Custom overlay tile servers')); ?></b> <i class="fa fa-angle-double-down" aria-hidden="true"></i></h3>
<div id="overlayserverdiv">
    <div id="overlayserveradd">
        <p><?php p($l->t('Server name')); ?> :</p>
        <input type="text" id="overlayservername" title="<?php p($l->t('For example : my custom server')); ?>"/>
        <p><?php p($l->t('Server url')); ?> :</p>
        <input type="text" id="overlayserverurl" title="<?php p($l->t('For example : http://overlay.server.org/cycle/{z}/{x}/{y}.png')); ?>"/>
        <p><?php p($l->t('Min zoom (1-20)')); ?> :</p>
        <input type="text" id="overlayminzoom" value="1"/>
        <p><?php p($l->t('Max zoom (1-20)')); ?> :</p>
        <input type="text" id="overlaymaxzoom" value="18"/>
        <label for="overlaytransparent"><?php p($l->t('Transparent')); ?> :</label>
        <input type="checkbox" id="overlaytransparent" checked/>
        <p><?php p($l->t('Opacity (0.0-1.0)')); ?> :</p>
        <input type="text" id="overlayopacity" value="0.4"/>
        <button id="addoverlayserver"><i class="fa fa-plus-circle" aria-hidden="true" style="color:green;"></i> <?php p($l->t('Add')); ?></button>
    </div>
    <div id="overlayserverlist">
        <h3><?php p($l->t('Your overlay tile servers')); ?></h3>
        <ul class="disclist">
<?php
if (count($_['useroverlayservers']) > 0){
    foreach($_['useroverlayservers'] as $ts){
        echo '<li title="'.$ts['url'].'"';
        foreach (Array('servername', 'type', 'url', 'layers', 'version', 'format', 'opacity', 'transparent', 'minzoom', 'maxzoom', 'attribution') as $field) {
            if (array_key_exists($field, $ts)) {
                echo ' '.$field.'="';
                p($ts[$field]);
                echo '"';
            }
        }
        echo '>';
        p($ts['servername']);
        echo '&nbsp <button><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i> ';
        p($l->t('Delete'));
        echo '</button></li>';
    }
}
?>
        </ul>
    </div>
</div>
<hr/>
<h3 class="sectiontitle customtiletitle" for="tilewmsserverdiv"><b><?php p($l->t('Custom WMS tile servers')); ?></b> <i class="fa fa-angle-double-down" aria-hidden="true"></i></h3>
<div id="tilewmsserverdiv">
    <div id="tilewmsserveradd">
        <p><?php p($l->t('Server name')); ?> :</p>
        <input type="text" id="tilewmsservername" title="<?php p($l->t('For example : my custom server')); ?>"/>
        <p><?php p($l->t('Server url')); ?> :</p>
        <input type="text" id="tilewmsserverurl" title="<?php p($l->t('For example : http://tile.server.org/cycle/{z}/{x}/{y}.png')); ?>"/>
        <p><?php p($l->t('Min zoom (1-20)')); ?> :</p>
        <input type="text" id="tilewmsminzoom" value="1"/>
        <p><?php p($l->t('Max zoom (1-20)')); ?> :</p>
        <input type="text" id="tilewmsmaxzoom" value="18"/>
        <p><?php p($l->t('Format')); ?> :</p>
        <input type="text" id="tilewmsformat" value="image/jpeg"/>
        <p><?php p($l->t('WMS version')); ?> :</p>
        <input type="text" id="tilewmsversion" value="1.1.1"/>
        <p><?php p($l->t('Layers to display')); ?> :</p>
        <input type="text" id="tilewmslayers" value=""/>
        <button id="addtileserverwms"><i class="fa fa-plus-circle" aria-hidden="true" style="color:green;"></i> <?php p($l->t('Add')); ?></button>
    </div>
    <div id="tilewmsserverlist">
        <h3><?php p($l->t('Your WMS tile servers')); ?></h3>
        <ul class="disclist">
<?php
if (count($_['usertileserverswms']) > 0){
    foreach($_['usertileserverswms'] as $ts){
        echo '<li title="'.$ts['url'].'"';
        foreach (Array('servername', 'type', 'url', 'layers', 'version', 'format', 'opacity', 'transparent', 'minzoom', 'maxzoom', 'attribution') as $field) {
            if (array_key_exists($field, $ts)) {
                echo ' '.$field.'="';
                p($ts[$field]);
                echo '"';
            }
        }
        echo '>';
        p($ts['servername']);
        echo '&nbsp <button><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i> ';
        p($l->t('Delete'));
        echo '</button></li>';
    }
}
?>
        </ul>
    </div>
</div>
<hr/>
<h3 class="sectiontitle customtiletitle" for="overlaywmsserverdiv"><b><?php p($l->t('Custom WMS overlay servers')); ?></b> <i class="fa fa-angle-double-down" aria-hidden="true"></i></h3>
<div id="overlaywmsserverdiv">
    <div id="overlaywmsserveradd">
        <p><?php p($l->t('Server name')); ?> :</p>
        <input type="text" id="overlaywmsservername" title="<?php p($l->t('For example : my custom server')); ?>"/>
        <p><?php p($l->t('Server url')); ?> :</p>
        <input type="text" id="overlaywmsserverurl" title="<?php p($l->t('For example : http://overlay.server.org/cycle/{z}/{x}/{y}.png')); ?>"/>
        <p><?php p($l->t('Min zoom (1-20)')); ?> :</p>
        <input type="text" id="overlaywmsminzoom" value="1"/>
        <p><?php p($l->t('Max zoom (1-20)')); ?> :</p>
        <input type="text" id="overlaywmsmaxzoom" value="18"/>
        <label for="overlaywmstransparent"><?php p($l->t('Transparent')); ?> :</label>
        <input type="checkbox" id="overlaywmstransparent" checked/>
        <p><?php p($l->t('Opacity (0.0-1.0)')); ?> :</p>
        <input type="text" id="overlaywmsopacity" value="0.4"/>
        <p><?php p($l->t('Format')); ?> :</p>
        <input type="text" id="overlaywmsformat" value="image/jpeg"/>
        <p><?php p($l->t('WMS version')); ?> :</p>
        <input type="text" id="overlaywmsversion" value="1.1.1"/>
        <p><?php p($l->t('Layers to display')); ?> :</p>
        <input type="text" id="overlaywmslayers" value=""/>
        <button id="addoverlayserverwms"><i class="fa fa-plus-circle" aria-hidden="true" style="color:green;"></i> <?php p($l->t('Add')); ?></button>
    </div>
    <div id="overlaywmsserverlist">
        <h3><?php p($l->t('Your WMS overlay tile servers')); ?></h3>
        <ul class="disclist">
<?php
if (count($_['useroverlayserverswms']) > 0){
    foreach($_['useroverlayserverswms'] as $ts){
        echo '<li title="'.$ts['url'].'"';
        foreach (Array('servername', 'type', 'url', 'layers', 'version', 'format', 'opacity', 'transparent', 'minzoom', 'maxzoom', 'attribution') as $field) {
            if (array_key_exists($field, $ts)) {
                echo ' '.$field.'="';
                p($ts[$field]);
                echo '"';
            }
        }
        echo '>';
        p($ts['servername']);
        echo '&nbsp <button><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i> ';
        p($l->t('Delete'));
        echo '</button></li>';
    }
}
?>
        </ul>
    </div>
</div>

</div>

</div>
<div class="sidebar-pane" id="help">
    <h1 class="sectiontitle"><?php p($l->t('About GpsPhoneTracking')); ?></h1>
    <hr/><br/>
    <h3 class="sectiontitle"><?php p($l->t('Shortcuts')); ?> :</h3>
    <ul class="disclist">
        <li><b>&lt;</b> : <?php p($l->t('toggle sidebar')); ?></li>
    </ul>

    <br/><hr/><br/>
    <h3 class="sectiontitle"><?php p($l->t('Documentation')); ?></h3>
    <a class="toplink" target="_blank" href="https://gitlab.com/eneiluj/gpsphonetracking-oc/wikis/home">
    <i class="fa fa-gitlab" aria-hidden="true"></i>
    Project wiki
    </a>
    <br/>

    <br/><hr/><br/>
    <h3 class="sectiontitle"><?php p($l->t('Source management')); ?></h3>
    <ul class="disclist">
        <li><a class="toplink" target="_blank" href="https://gitlab.com/eneiluj/gpsphonetracking-oc">
        <i class="fa fa-gitlab" aria-hidden="true"></i>
        Gitlab project main page</a></li>
        <li><a class="toplink" target="_blank" href="https://gitlab.com/eneiluj/gpsphonetracking-oc/issues">
        <i class="fa fa-gitlab" aria-hidden="true"></i>
        Gitlab project issue tracker</a></li>
    </ul>

    <br/><hr/><br/>
    <h3 class="sectiontitle"><?php p($l->t('Authors')); ?> :</h3>
    <ul class="disclist">
        <li>Julien Veyssier</li>
    </ul>

</div>
</div>
</div>
<!-- ============= MAP DIV =============== -->
<div id="map" class="sidebar-map"></div>

