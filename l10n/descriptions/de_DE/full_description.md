# PhoneTrack Nextcloud App

📱 PhoneTrack ist eine Nextcloud-Anwendung zur Verfolgung und Speicherung von Standorten mobiler Geräte.

🗺 Sie erfasst Informationen von Protokollierungs-Apps auf Mobiltelefonen und zeigt diese dynamisch auf einer Karte an.

🌍 Helfen Sie uns, diese App auf [PhoneTrack Crowdin Projekt](https://crowdin.com/project/phonetrack) zu übersetzen.

⚒ Schauen Sie sich weitere Möglichkeiten in den [Mitwirkungsrichtlinien](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/CONTRIBUTING.md) an, wie Sie mitwirken können.

Wie PhoneTrack verwendet wird:

* Erstelle eine Tracking-Sitzung.
* Gib den Protokollierungslink\* an die mobilen Geräte weiter. Wähle die [Protokollierungsmethode](https://gitlab.com/eneiluj/phonetrack-oc/wikis/userdoc#logging-methods) aus, die Du bevorzugst.
* Sehen Sie sich die Geräteposition der Session in Echtzeit (oder nicht) in PhoneTrack an oder teilen Sie sie mit öffentlichen Seiten.

(\*) Vergessen Sie nicht, den Gerätenamen im Link (und nicht in den Einstellungen der Protokollierungsanwendung) einzustellen. Ersetzen Sie "yourname" mit dem gewünschten Gerätenamen. Das Einstellen des Gerätenamens in den Einstellungen der Logging-App funktioniert nur mit Owntracks, Traccar und OpenGTS.

Auf der Hauptseite von PhoneTrack können Sie während einer Sitzung:

* 📍 Standortverlauf anzeigen
* ⛛ Datenpunkte filtern
* ✎ Datenpunkte manuell bearbeiten/hinzufügen/löschen
* ✎ Geräte bearbeiten (umbenennen, Farb/Form ändern, in eine andere Sitzung verschieben)
* ⛶ Geofence Zonen für Geräte festlegen
* ⚇ Definiere Näherungswarnungen für Gerätepaare
* 🖧 Teilen Sie eine Sitzung mit anderen Nextcloud-Benutzern oder mit einem öffentlichen Link (nur lesen)
* 🔗 Erzeuge öffentliche Links mit optionalen Einschränkungen (Filter, Gerätename, letzte Positionen, Geofencing Vereinfachung)
* 🖫 Sitzung im GPX-Format importieren/exportieren (eine Datei mit einer Aufzeichnung pro Gerät oder eine Datei pro Gerät)
* 🗠 Sitzungsstatistiken anzeigen
* 🔒 [Reservieren Sie einen Gerätenamen](https://gitlab.com/eneiluj/phonetrack-oc/wikis/userdoc#device-name-reservation) um sicherzustellen, dass nur autorisierte Benutzer sich mit diesem Namen einloggen können
* 🗓 Umschalten zwischen Auto-Export und Auto-Bereinigung der Sitzung (täglich/wöchentlich/monatlich)
* ◔ Jeder Benutzer kann wählen, was passieren soll, wenn die Menge der erlaubten Datenpunkte erreicht ist (Protokollierung unterbrechen oder ältesten Punkt löschen)

Öffentliche Seite und öffentlich gefilterte Seite funktionieren wie die Hauptseite, außer dass nur eine Sitzung angezeigt wird, alles schreibgeschützt ist und keine Anmeldung erforderlich ist.

Diese App wurde auf Nextcloud 15 mit Firefox 57+ und Chromium getestet.

Diese App ist kompatibel mit Thematisierungsfarben und Barrierefreiheitsthemes!

Diese App befindet sich in der Entwicklung.

## Installieren

Siehe [AdminDoc](https://gitlab.com/eneiluj/phonetrack-oc/wikis/admindoc) für Installationsdetails.

Überprüfen Sie die [CHANGELOG](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/CHANGELOG.md#change-log) Datei, um zu sehen, was neu ist und was in der nächsten Version kommt.

Überprüfen Sie die [AUTHORS](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/AUTHORS.md#authors) Datei, um die vollständige Liste der Autoren zu sehen.

## Bekannte Probleme

* PhoneTrack **funktioniert nun** mit der aktivierten Nextcloud Gruppenbeschränkung. Siehe [admindoc](https://gitlab.com/eneiluj/phonetrack-oc/wikis/admindoc#issue-with-phonetrack-restricted-to-some-groups-in-nextcloud).

Jedes Feedback ist willkommen.