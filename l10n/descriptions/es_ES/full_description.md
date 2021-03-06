# Aplicaci贸n Nextcloud PhoneTrack

馃摫 PhoneTrack es una aplicaci贸n Nextcloud para el rastreo y almacenamiento de localizaci贸n de dispositivos.

馃椇 PhoneTrack recibe la informaci贸n de aplicaciones m贸viles de log y la muestra din谩micamete en un mapa.

馃實 Ay煤danos a traducir esta aplicacion en [PhoneTrack Crowdin project](https://crowdin.com/project/phonetrack).

鈿? Cheque谩 otras formas de ayudar en [contribution guidelines](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/CONTRIBUTING.md).

C贸mo usar PhoneTrack:

* Crea una sesi贸n de rastreo.
* Da el enlace de registro\* a los dispositivos m贸viles. Elija el [m茅todo de seguimiento](https://gitlab.com/eneiluj/phonetrack-oc/wikis/userdoc#logging-methods) que prefiera.
* Vea la ubicaci贸n de los dispositivos de la sesi贸n en tiempo real (o no) en PhoneTrack o comp谩rtela con p谩ginas p煤blicas.

(\*) No olvide establecer el nombre del dispositivo en el enlace (en lugar de en la configuraci贸n de la aplicaci贸n de seguimiento). Sustituye "tunombre" con el nombre que desees del dispositivo. Configurar el nombre del dispositivo en la app de registro solo funciona con Owntracks, Traccar y OpenGTS.

En la p谩gina principal de PhoneTrack, mientras vigilas una sesi贸n, puedes:

* 馃搷 Mostrar el historial de localizaciones
* 鉀? Filtrar puntos
* 鈻? Editar/a帽adir/borrar puntos manualmente
* 鉁? Editar dispositivos (cambiar nombre, cambiar color/forma, ir a otra sesi贸n)
* Definir zonas de geovallado para dispositivos
* 鈻? Definir alertas de proximidad para dispositivos emparejados
* 鉁? Compartir una sesi贸n con otros usuarios de Nextcloud o con un enlace p煤blico (s贸lo lectura)
* 馃敆 Generar enlaces p煤blicos con restricciones opcionales (filtros, nombre de dispositivo, s贸lo 煤ltima posici贸n, simplificaci贸n de geovallado)
* . Importar/exportar una sesi贸n en formato GPX (un archivo con un track por dispositivo o un archivo por dispositivo)
* 鈻? Mostrar estad铆sticas de sesiones
* 馃敀 [Reserva un nombre de dispositivo](https://gitlab.com/eneiluj/phonetrack-oc/wikis/userdoc#device-name-reservation) para asegurarse de que s贸lo el usuario autorizado puede entrar con este nombre
* 馃棑 Activar la exportaci贸n autom谩tica de sesi贸n y la purga autom谩tica (diaria/semanal/mensual)
* . Elija qu茅 hacer cuando se alcanza el m谩xomo n煤mero de puntos (bloquear el registro o eliminar el punto m谩s antiguo)

La p谩gina p煤blica y la p谩gina p煤blica filtrada funcionan como la p谩gina principal, excepto que s贸lo se muestra una sesi贸n, todo es de s贸lo lectura y no hay necesidad de iniciar sesi贸n.

Esta aplicaci贸n est谩 probada en Nextcloud 17 con Firefox 57+ y Chromium.

隆Esta aplicaci贸n es compatible con colores tem谩ticos y temas de accesibilidad!

Esta aplicaci贸n est谩 en desarrollo.

## Instalar

Ver el [AdminDoc](https://gitlab.com/eneiluj/phonetrack-oc/wikis/admindoc) para los detalles de instalaci贸n.

Mira el archivo [CHANGELOG](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/CHANGELOG.md#change-log) para ver lo nuevo y lo que vendr谩 en la pr贸xima versi贸n.

Mira [AUTORES](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/AUTHORS.md#authors) para ver la lista completa de autores.

## Problemas conocidos

* PhoneTrack **ahora funciona** con la restricci贸n de grupos de Nextcloud activada. Mira [admindoc](https://gitlab.com/eneiluj/phonetrack-oc/wikis/admindoc#issue-with-phonetrack-restricted-to-some-groups-in-nextcloud).

Se agradece cualquier comentario.