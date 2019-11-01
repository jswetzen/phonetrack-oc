# Приложение PhoneTrack в Nextcloud

📱 PhoneTrack е приложение Nextcloud за проследяване и съхраняване на местоположения на мобилни устройства.

🗺 Той получава информация от приложения за регистриране на мобилни телефони и я показва динамично на карта.

🌍 Помогнете ни да преведем това приложение на [PhoneTrack Crowdin project](https://crowdin.com/project/phonetrack).

⚒ Вижте други начини за помощ в [contribution guidelines](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/CONTRIBUTING.md).

Как да използваме PhoneTrack:

* Създайте проследяваща сесия.
* Дайте връзката за записване \*на мобилните устройства. Изберете [ метод на записване ](https://gitlab.com/eneiluj/phonetrack-oc/wikis/userdoc#logging-methods), който предпочитате.
* Гледайте местоположението на устройствата на сесията в реално време (или не) в PhoneTrack или го споделяйте с обществени страници.

(\ *) Не забравяйте да зададете името на устройството в връзката (вместо в настройките на приложението за записване). Заменете "вашето име" с желаното име на устройството. Задаването на името на устройството в настройките на приложението за регистриране; работи само с Owntracks, Traccar и OpenGTS.

On PhoneTrack main page, while watching a session, you can :

* 📍 Display location history
* ⛛ Filter points
* ✎ Manually edit/add/delete points
* ✎ Edit devices (rename, change color/shape, move to another session)
* ⛶ Define geofencing zones for devices
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