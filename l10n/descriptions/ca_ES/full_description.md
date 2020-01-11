# Aplicació PhoneTrack per Nextcloud

📱 PhoneTrack és una aplicació Nextcloud per rastrejar i emmagatzemar la posició dels dispositius mòbils.

🗺 Rep informació de les aplicacions de registre de telefonia mòbil i la mostra en directe en un mapa.

🌍 Ajuda'ns a traduir aquesta aplicació a [el projecte Crowdin de PhoneTrack](https://crowdin.com/project/phonetrack).

⚒ Trobeu altres maneres d’ajudar en les [indicacions de contribució](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/CONTRIBUTING.md).

Com fer servir PhoneTrack :

* Crear una sessió de seguiment.
* Doneu l'enllaç de registre \ * als dispositius mòbils. Trieu el [mètode de registre](https://gitlab.com/eneiluj/phonetrack-oc/wikis/userdoc#logging-methods) que preferiu.
* Consulteu la ubicació dels dispositius de sessió en temps real (o no) a PhoneTrack o compartiu-la amb enllaços públics.

(\*) No oblideu establir el nom del dispositiu a l'enllaç (més que no pas a la configuració de l'aplicació de registre). Substituir "elvostrenom" amb el nom de dispositiu desitjat. L'establiment del nom del dispositiu a la configuració de l'aplicació de registre només funciona amb Owntracks, Traccar i OpenGTS.

A la pàgina principal de PhoneTrack, en veure una sessió, podeu:

* 📍 Consultar l'historial d'ubicacions
* ⛛ Filtrar punts
* Manualment editar/afegir/esborrar punts
* ✎ Edita els dispositius (canvia el nom, canvia el color / la forma, passa a una altra sessió)
* Definir zones de geolocalització per dispositius
* ⚇ Estableix alertes de proximitat per parells de dispositius
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