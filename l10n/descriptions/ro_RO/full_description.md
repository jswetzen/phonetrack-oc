# Aplicația PhoneTrack Nextcloud

PhoneTrack este o aplicație pentru Nextcloud care ajută la urmărirea și stocarea informațiilor de urmărire a dispozitivelor mobile.

Aplicația primește informații de autentificare de la aplicațiile instalate pe telefonul mobil și le afișează în mod dinamic pe hartă.

Ajută-ne să traducem această aplicație pe [PhoneTrack Crowdin project](https://crowdin.com/project/phonetrack).

Vezi și alte moduri de a ajuta în [ghid de contribuții](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/CONTRIBUTING.md).

Cum să utilizaţi PhoneTrack:

* Creați o sesiune de urmărire.
* Dați linkul de logare\* către dispozitivele mobile. Alege [metoda de logare](https://gitlab.com/eneiluj/phonetrack-oc/wikis/userdoc#logging-methods) pe care o preferi.
* Urmăriți locația dispozitivelor sesiunii în timp real (sau nu) în PhoneTrack sau partajați-o cu pagini publice.

(\*) Nu uitați să setați numele dispozitivului în link (mai degrabă decât în setările aplicației de logare). Înlocuiți "numele" cu numele dispozitivului dorit. Setarea numelui dispozitivului în setările aplicaţiei de logare funcţionează doar cu Owntracks, Traccar şi OpenGTS.

Pe pagina principală PhoneTrack, în timp ce urmărești o sesiune, puteți să:

* 📍 Afișați istoricul locațiilor
* ⧩ Filtrați punctele înregistrate
* ✎ Editați/adăugați/ștergeți puncte manual
* ✎ Editați dispozitivele (redenumire, schimbare culoare/formă, mutare la o altă sesiune)
* ◯ Definiți zone de geofencing pentru dispozitive
* ⚇ Definiți alerte de proximitate pentru dispozitive pereche
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

## Instalare

Vezi [AdminDoc](https://gitlab.com/eneiluj/phonetrack-oc/wikis/admindoc) pentru mai multe detalii despre instalare.

Check [CHANGELOG](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/CHANGELOG.md#change-log) file to see what's new and what's coming in next release.

Check [AUTHORS](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/AUTHORS.md#authors) file to see complete list of authors.

## Known issues

* PhoneTrack **now works** with Nextcloud group restriction activated. See [admindoc](https://gitlab.com/eneiluj/phonetrack-oc/wikis/admindoc#issue-with-phonetrack-restricted-to-some-groups-in-nextcloud).

Any feedback will be appreciated.