<?php
require_once (realpath(dirname(__FILE__).'/../../../../../..').'/NicerAppWebOS/boot.php');
global $naWebOS; global $naLAN;
$view = $naWebOS->view;

$setPath = $view['folder']['path'];
$authorEmail = 'rene.veerman.netherlands@gmail.com';
$spacer = "\n\t\t\t\t";
?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="en">
	<meta http-equiv="content-language" content="english">
	<link type="text/css" rel="StyleSheet" media="screen" href="/NicerAppWebOS/apps/NicerAppWebOS/applications/2D/musicPlayer.javascriptRendering/index.css?changed=<?php echo date('Ymd-His', filectime(dirname(__FILE__).'/index.css'));?>"/>
	<link type="text/css" rel="StyleSheet" media="screen" href="/NicerAppWebOS/3rd-party/jQuery/jPlayer-2.9.1/jplayer.vivid.css"/>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="/NicerAppWebOS/3rd-party/jQuery/jquery-ui-1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="/NicerAppWebOS/apps/NicerAppWebOS/applications/2D/musicPlayer.javascriptRendering/app.musicPlayer_siteContent.source.js?changed=<?php echo date('Ymd-His', filemtime(dirname(__FILE__).'/app.musicPlayer_siteContent.source.js'));?>"></script>
    <script type="text/javascript">
        //NOT THIS: na.m.waitForCondition ('frontPage.dialog.siteContent.php : desktopIdle?', na.m.desktopIdle, function() {
        $(document).ready(function() {
            delete na.site.settings.current.app;
            na.d.s.visibleDivs.push('#siteToolbarLeft');
            na.d.s.visibleDivs.push('#siteToolbarRight');
            na.d.s.visibleDivs.push('#siteToolbarTop');
            //na.desktop.resize();
        //}, 100);
        });
    </script>


	<div id="app__musicPlayer__player" class="vividDialog naNoComments" style="overflow:visible;position:absolute;width:320px;height:120px;">
		<div class="audioPlayerUI">
            <div class="audioPlayerButtons">
                <div id="btnPlayPause" class="vividButton4" buttonType="btn_audioVideo_playPause" onclick="na.musicPlayer.playpause()"></div>
                <div id="btnMuteUnmute" class="vividButton4" buttonType="btn_audioVideo_muteUnmute" onclick="na.musicPlayer.mute()"></div>
                <div id="btnShuffle" class="vividButton4" buttonType="btn_audioVideo_shuffle" onclick="na.musicPlayer.toggleShuffle()"></div>
                <div id="btnRepeat" class="vividButton4" buttonType="btn_audioVideo_repeat" onclick="na.musicPlayer.toggleRepeat()"></div>
            </div>
            <div class="flexBreak"></div>
            <div class="audioPlayerControls">
                <div class="audioVolumeBar" onclick="na.musicPlayer.setVolume(event);">
                    <div class="audioVolumeBar_setting" style="width:calc(100% - 4px);"></div>
                </div>
                <div class="audioSeekBar" onclick="na.musicPlayer.seek(event);">
                    <div class="audioSeekBar_setting" style="width:0px;"></div>
                </div>
            </div>
            <div class="audioPlayerControlsLabels">
                <div class="audioVolumeBarLabel" style="text-align:center">Volume : 100</div>
                <div class="audioSeekBarLabel">
                    <div class="audioSeekBarLabel_currentTime">0:00</div>
                    <div class="audioSeekBarLabel_length">1:15:00</div>
                </div>
            </div>
		</div>
	</div>

	<div id="app__musicPlayer__playlist" class="vividDialog naNoComments" theme="dark" style="text-align:center;opacity:0.001;overflow:visible;position:absolute; width:300px;height:300px;">
        <h2 class="vt backdropped" style="padding:0px !important; margin:20px !important;display:flex;justify-content:center;align-items:center;width:auto;height:50px;font-size:10px;background:rgba(0,0,255,0.25);color:white;border-radius:10px;box-shadow:2px 2px 3px 2px rgba(0,0,0,0.7);">Playlist<br/>(drag and drop items onto this window)</h2>
		<ul id="playlist" class="vividScrollpane" style="width:100%;height:calc(100% - 50px);"></ul>
	</div>
	
	<div id="app__musicPlayer__description" class="vividDialog naNoComments" theme="dark" style="opacity:0.001;overflow:visible;position:absolute;width:320px;height:300px;">
        <div class="vividDialogContent" style="font-size:inherit">
            <div id="mp3descText" style="font-size:inherit"></div>
            <div id="siteIntroText">
                
                <?php //echo $htmlIntro?>
            </div>
		</div>
	</div>
