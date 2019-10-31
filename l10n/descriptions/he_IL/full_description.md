# PhoneTrack Nextcloud application

PhoneTrack הינה אפליקציה העוקבת ושומרת אחרי נתוני המיקום שלך, בצורה חלקה ואמינה.

האפליקציה מקבלת נתונים באמצעות תוכנת טרקר המותקנת במכשירך, ומציגה נתונים אלו בצורה דינמית תחת חשבונך בסביבת ה-NextCloud שלך.

נשמח לקבל עזרה בשיפור האפליקציה.

מספר דרכים שתוכל לעזור לנו בקישורך [בעזרה לפיתוח וקידום האפליקציה](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/CONTRIBUTING.md).

איך PhoneTrack עובד:

* תחילה, צור טוקן מעקב באמצעות הפאנל שבאפליקציה.
* הורד אפליקצית מעקב מחנות האפליקציות או השתמש בגרסאת נייטיב, הזן את הלינק שקיבלת בתהליך יצור הסשן שבאפליקציה לקשר את מכשירך לשרת. .
* לאחר התקנת האפליקציה, תוכל לראות על המפה את המקום הנוכחי של המכשיר, תלוי באופן ובקצב העידכון שהזנת.

אל תשכח להזין שם למכשיר בלינק שיצרת, אחריו תוכל לעקוב. Replace "yourname" with the desired device name. שימוש בשם המכשיר מתאפשר אך ורק עם האפליקציות Owntracks, Traccar ו- OpenGTS.

בעמוד הראשי של הסשן של תוכל לראות:

* היסטורית מיקומים
* אפשרויות סינון מתקדמות
* הוספה ידנית של מיקומים
* תוכל לשנות שם לסשן, אפשרויות עיצוב והעברה לסנשים אחרים
* תוכל להגדיר אזורי מיקום למכשירך
* ⚇ Define proximity alerts for device pairs
* 🖧 Share a session to other Nextcloud users or with a public link (read-only)
* 🔗 Generate public share links with optional restrictions (filters, device name, last positions only, geofencing simplification)
* 🖫 Import/export a session in GPX format (one file with one track per device or one file per device)
* 🗠 Display sessions statistics
* 🔒 [Reserve a device name](https://gitlab.com/eneiluj/phonetrack-oc/wikis/userdoc#device-name-reservation) to make sure only authorized user can log with this name
* 🗓 Toggle session auto export and auto purge (daily/weekly/monthly)
* ◔ Choose what to do when point number quota is reached (block logging or delete oldest point)

Public page and public filtered page work like main page except there is only one session displayed, everything is read-only and there is no need to be logged in.

This app is tested on Nextcloud 17 with Firefox 57+ and Chromium.

This app is compatible with theming colors and accessibility themes !

This app is under development.

## Install

See the [AdminDoc](https://gitlab.com/eneiluj/phonetrack-oc/wikis/admindoc) for installation details.

Check [CHANGELOG](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/CHANGELOG.md#change-log) file to see what's new and what's coming in next release.

Check [AUTHORS](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/AUTHORS.md#authors) file to see complete list of authors.

## Known issues

* PhoneTrack **now works** with Nextcloud group restriction activated. See [admindoc](https://gitlab.com/eneiluj/phonetrack-oc/wikis/admindoc#issue-with-phonetrack-restricted-to-some-groups-in-nextcloud).

Any feedback will be appreciated.