# Nextcloud aplikace PhoneTrack

📱 PhoneTrack je aplikace pro Nextcloud, určená pro sledování a uchovávání pozic mobilních zařízení.

🗺 Informace získává ze záznamových aplikací pro mobilní telefony a průběžně je zobrazuje na mapě.

🌍 Pomozte nám s překládáním textů v rozhraní této aplikace v rámci [projektu PhoneTrack na službě Crowdin](https://crowdin.com/project/phonetrack).

⚒ Podívejte se na další způsoby, jak pomoci v [pokynech pro přispěvatele](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/CONTRIBUTING.md).

Jak PhoneTrack používat:

* Vytvořte relaci sledování.
* Zadejte odkaz na úložiště záznamů\* do mobilních zařízení. Zvolte vámi upřednostňovanou [metodu zaznamenávání](https://gitlab.com/eneiluj/phonetrack-oc/wikis/userdoc#logging-methods).
* Sledujte pozice zařízení v rámce dané relace v reálném čase (nebo ne) v PhoneTrack nebo ji sdílejte prostřednictvím veřejných stránek.

(\*) Nezapomeňte do odkazu zadat také název zařízení (namísto v nastavení zaznamenávající aplikace). Nahraďte „vašejméno“ požadovaným názvem zařízení. Nastavení názvu zařízení v záznamové aplikaci funguje pouze v případě Owntracks, Traccar a OpenGTS.

Na hlavní stránce PhoneTrack můžete během sledování relace:

* 📍 Zobrazit historii polohy
* ⛛ Filtrovat body
* ✎ Ručně upravovat/přidávat/mazat body
* ✎ Upravit zařízení (přejmenovat, změnit barvu/tvar, přesunout do jiné relace)
* ⛶ Definovat oblasti geooplocení pro zařízení
* ⚇ Definovat výstrahy přiblížení pro dvojice zařízení
* 🖧 Sdílet relaci ostatním uživatelům Nextcloud nebo veřejným odkazem (pouze pro čtení)
* 🔗 Generovat veřejné odkazy s volitelnými omezeními (filtry, název zařízení, poslední pozice, geooplocení)
* 🖫 Importovat/Exportovat relace ve formátu GPX (jeden soubor s jednou trasou nebo jeden soubor na zařízení)
* 🗠 Zobrazit statistiky relace
* 🔒 [Zarezervovat název zařízení](https://gitlab.com/eneiluj/phonetrack-oc/wikis/userdoc#device-name-reservation) abyste se ujistili, že pouze pověřený uživatel se může tímto názvem přihlásit
* 🗓 Přepnout automatický export relace a automatické vyčištění (denně/týdně/měsíčně)
* ◔ Zvolte co dělat, když je dosaženo kvóty počtu bodů (blokovat zaznamenávání nebo smazání nejstaršího bodu)

Veřejná a veřejně filtrovaná stránka fungují stejně jako hlavní stránka ale je zobrazena pouze jedna relace, vše je pouze pro čtení a není třeba být přihlášen.

Tato aplikace je zkoušená na Nextcloud 17 a prohlížečích Firefox 57 a novějším a Chromium.

Tato aplikace je kompatibilní s barvami motivu vzhledu a motivy pro zpřístupnění!

Na této aplikaci stále ještě probíhá intenzivní vývoj.

## Instalace

Podrobnosti ohledně instalace naleznete v [dokumentaci pro správce](https://gitlab.com/eneiluj/phonetrack-oc/wikis/admindoc).

Co je nového a co se chystá v příštím vydání naleznete v souboru [CHANGELOG](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/CHANGELOG.md#change-log).

Všechny autory naleznete v souboru [AUTHORS](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/AUTHORS.md#authors).

## Známé problémy

* PhoneTrack **nyní funguje** i při zapnutém omezení na skupiny v Nextcloud. Viz [dokumentace pro správce](https://gitlab.com/eneiluj/phonetrack-oc/wikis/admindoc#issue-with-phonetrack-restricted-to-some-groups-in-nextcloud).

Jakákoliv zpětná vazba bude vítána.