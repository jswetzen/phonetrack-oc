# Aplikácia Nextcloud PhoneTrack

📱 PhoneTrack je Nextcloud aplikácia na sledovanie a ukladanie polohy mobilných zariadení.

🗺 Prijíma informácie z mobilných aplikácií na sledovanie a dynamicky ich zobrazuje na mape.

🌍 Pomôžte nám prekladať túto aplikáciu na [PhoneTrack Crowdin project](https://crowdin.com/project/phonetrack).

⚒ Pozrite si iné možnosti ako pomôcť na [contribution guidelines](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/CONTRIBUTING.md).

Ako používať PhoneTrack :

* Vytvoriť sledovaciu reláciu.
* Give the logging link\* to the mobile devices. Vyberte si preferovanú [metódu záznamu](https://gitlab.com/eneiluj/phonetrack-oc/wikis/userdoc#logging-methods).
* Watch the session's devices location in real time (or not) in PhoneTrack or share it with public pages.

(\*) Nezabudnite nastaviť názov zariadenia v odkaze (radšej ako v nastaveniach logovacej aplikácie). Nahraďte "yourname" zvoleným názvom zariadenia. Nastavenie názvu zariadenia v nastaveniach logovacej aplikácie funguje len s Owntracks, Traccar a OpenGTS.

Na hlavnej stránke PhoneTrack môžeš počas sledovania sedenia:

* 📍 Zobraziť históriu polohy
* ⛛ Filtrovať body
* ✎ Manuálne upravovať/pridávať/mazať body
* ✎ Upravovať zariadenia (premenovať, zmeniť farbu/tvar, presúvať do iného sedenia)
* ⛶ Definovať geofence zóny pre zariadenia
* ⚇ Zadávať výstrahy vzdialenia pre páry zariadení
* 🖧 Zdieľať sedenie s ďalšími Nextcloud používateľmi alebo pomocou verejných odkazov (len na čítanie)
* 🔗 Generate public share links with optional restrictions (filters, device name, last positions only, geofencing simplification)
* 🖫 Import/export a session in GPX format (one file with one track per device or one file per device)
* 🗠 Display sessions statistics
* 🔒 [Rezervovať názov zariadenia](https://gitlab.com/eneiluj/phonetrack-oc/wikis/userdoc#device-name-reservation) pre uistenie sa, že len autorizovaný používateľ sa môže prihlásiť s týmto menom
* 🗓 Toggle session auto export and auto purge (daily/weekly/monthly)
* ◔ Choose what to do when point number quota is reached (block logging or delete oldest point)

Public page and public filtered page work like main page except there is only one session displayed, everything is read-only and there is no need to be logged in.

Táto aplikáca je testovaná na Nextcloud 17 s Firefox 57+ a Chromium.

Táto aplikácia je kompatibilná s farbami šablón a šablónami dostupnosti!

Táto aplikácia je ešte vo vývoji.

## Inštalácia

Pozrite si [AdminDoc](https://gitlab.com/eneiluj/phonetrack-oc/wikis/admindoc) pre detaily inštalácie.

Pozrite si súbor [CHANGELOG](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/CHANGELOG.md#change-log) čo je nové a čo sa chystá do ďalšej verzie.

Pozrite si súbor [AUTHORS](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/AUTHORS.md#authors) a zobrazte si kompletný list autorov.

## Známe problémy

* PhoneTrack **teraz funguje** so zapnutými obmedzeniami pre Nextcloud skupiny. Pozrite [admindoc](https://gitlab.com/eneiluj/phonetrack-oc/wikis/admindoc#issue-with-phonetrack-restricted-to-some-groups-in-nextcloud).

Ocením akúkoľvek spätnú väzbu.