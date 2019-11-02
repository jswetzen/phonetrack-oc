# PhoneTrack Nextcloud application

📱 PhoneTrack is a Nextcloud application to track and store mobile devices locations.

🗺 It receives information from mobile phones logging apps and displays it dynamically on a map.

🌍 Help us to translate this app on [PhoneTrack Crowdin project](https://crowdin.com/project/phonetrack).

⚒ Check out other ways to help in the [contribution guidelines](https://gitlab.com/eneiluj/phonetrack-oc/blob/master/CONTRIBUTING.md).

How to use PhoneTrack :

* Create a tracking session.
* Give the logging link\* to the mobile devices. Choose the [logging method](https://gitlab.com/eneiluj/phonetrack-oc/wikis/userdoc#logging-methods) you prefer.
* Watch the session's devices location in real time (or not) in PhoneTrack or share it with public pages.

(\*) Don't forget to set the device name in the link (rather than in the logging app settings). 替換 ‘‘你的名稱’’ 只有在Owntracks, Traccar and OpenGTS這3款程式的設定中設定裝置名稱才有效。

在手機追踪程式主畫面檢視一段追踪任務時，你可以：

* 📍 顯示位置歷史記錄
* ⛛ 篩選記錄點
* ✎ 手動 編輯/新增/刪除 記錄點
* ✎ 總輯裝置 (重新命名，變更色彩/形狀，移動到其他裝置)
* ⛶ 定義裝置的地理圍欄區域
* ⚇ 定義裝置間近接警報
* 🖧 與其他Nextcloud使用者分享一段追踪任務 (只可讀取)
* 🔗 產生有選擇性的公開連結 (篩選器，裝置名稱，最後位置，地理圍欄)
* 🖫 匯入/匯出GPX格式的追踪任務 (每個裝置具有一段任務的一個檔案，或每個裝置一個檔案)
* 🗠 顯示追踪任務的統計資料
* 🔒 [鎖定裝置名稱](https://gitlab.com/eneiluj/phonetrack-oc/wikis/userdoc#device-name-reservation) 只有被授權才能使用鎖定的名稱
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