<?php
    $rootPath_vkdmd = realpath(dirname(__FILE__).'/../../../../../..');
    //echo $rootPath_vkdmd; die();
    require_once ($rootPath_vkdmd.'/NicerAppWebOS/boot.php');
    require_once ($rootPath_vkdmd.'/domainConfig/'.$naWebOS->domainFolder.'/mainmenu.items.php');
    global $naWebOS;
    global $naURLs;
    //var_dump ($naURLs);

    $appFolder = '/NicerAppWebOS/apps/NicerAppWebOS/applications/2D/musicPlayer';
    $rf = dirname(__FILE__).'/music/';
    //var_dump($rf); die();
    $folders = getFilePathList ($rf,true,'*.*',null,['dir']);
    //echo '<pre>'; var_dump($folders); die();
    $views = [];
    foreach ($folders as $idx => $folder) {
        if (strpos($folder['realpath'],'/meta')!==false) continue;
        $k1 = 'music__index__';
        $k2a = str_replace(' ','_',basename($folder['realPath']));
        $k2a1 = str_replace(' ','-',basename($folder['realPath']));
        $k3 = $k1.$k2a;
        $views[] = [ $k3 => [ $appFolder => [ 'folder' => $folder, 'set' => $k2a, 'seoValue' => 'music-'.$k2a1 ] ] ] ;
    }
    $json = array();
    $urls = array();
    //echo'<pre>';    var_dump($views);die();
    foreach ($views as $viewIDX => $view) {
        foreach ($view as $viewIDX2 => $app)
        foreach ($app as $appFolder => $viewSettings) {
            $viewName = $viewSettings['set'];
            $viewSettings['appFolder'] = $appFolder;
            $json[$viewName] = json_encode($viewSettings);
            $urls[$viewName] = '/view/'.base64_encode_url($json[$viewName]);
        }

    };

//var_dump($urls); die();
?>
    <link href="https://fonts.googleapis.com/css?family=Krona+One&display=swap" rel="stylesheet"> 
	<script type="text/javascript">
        delete na.site.settings.current.loadingApps;
	</script>
    <style>
        p {
            color : white;
            background : rgba(0,0,0,0.4);
            border-radius : 14px;
        }

        #pageTitle {
            display : inline-block;
        }

        .container {
            display : flex;
            justify-items : center;
            align-items : start;
            justify-content : center;
            align-content : start;
            width : 100%;
            height : 100%;
        }

        .bg {
            display : inline-block;
            background : rgba(0,0,0,0.4);
            border-radius : 14px;
            height : fit-content;
            text-align : center;
        }
        
    </style>
    <div class="container">
    <div class="bg">
        <h1 id="pageTitle" class="naVividTextCSS" style="font-size:200%;">nicer.app music collections</h1>
        <p style="width:350px">
        <!--<a class="contentSectionTitle3_a naVividTextCSS" href="<?php echo $naURLs['music_index__Beautiful_Chill_Mixes']?>"><span class="contentSectionTitle3_span">Beautiful Chill Mixes</span></a>-->
        <?php
            if (true) {
                $di = [
                    'matches' => $views
                ];
                $cmd = [
                    'di' => $di,
                    '{"HTML_className":"naWebOS-debug-outer-DIV"}' => 'naWebOS_desktopos_info',
                    '$appFolder' => $appFolder
                ];
                //naWebOS_output_debug_info ($cmd);
                //echo '<pre style="color:lime;">'; var_dump ($views); //die();
            };

            foreach ($views as $k1 => $v1) {
                foreach ($v1 as $k2 => $v2) {
                    foreach ($v2 as $k3 => $v3) {
                            if ($v3['set']=='meta') continue;
                            //echo '<pre style="color:skyblue;">'; var_dump ($v3); echo '</pre>';
                            //var_dump ($v3);   var_dump($urls); die();
                        ?>
                            <p><a class="contentSectionTitle3_a naVividTextCSS" href="<?php echo $urls[$v3['set']]?>"><span class="contentSectionTitle3_span"><?php echo $v3['set']?></span></a></p>
                        <?php
                    }
                }
            }
        ?>
        </p>
        <p style="width:350px;">
        Copyright Disclaimer: - Under section 107 of the copyright Act 1976, <a href="https://en.wikipedia.org/wiki/Fair_use" class="contentSectionTitle2_a" target="fairUse">which was reaffirmed in a 2021 court decision</a>, allowance is made for FAIR USE for purpose such a as criticism, comment, news reporting, teaching, scholarship and research. Fair use is a use permitted by copyright statues that might otherwise be infringing. Non- Profit, educational or personal use tips the balance in favor of FAIR USE.
        </p>
        <p>
        <a href="/NicerAppWebOS/screenshots/2025%20A.D./Screenshot_20250622_015900.png" class="nomod noPushState" target="_new"><img src="/NicerAppWebOS/screenshots/2025%20A.D./Screenshot_20250622_015900.png" style="width:350px"/></a>
        </p>
    </div>
    </div>
