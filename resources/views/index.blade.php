<!DOCTYPE HTML>
<!--
    Homepage by Emily !66666666Ok
    pls (dont) steal. Iam sorry Emily i liked it alot :( <3 u.
-->
<html>
    <head>
        <title>Homepage</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="icon" sizes="256x256" href="img/pomf.png">
        <link href="css/all.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="bg" id="bg"></div>
        <div id="toggleBlur">
            <p style="cursor: pointer;" onclick="toggleBlur();">Toggle blur</p>
        </div>
        <div id="toggleExpandDisable">
            <p id="toggleExpandDisableText" style="cursor: pointer;" onclick="toggleExpandDisable();">Disable Expand</p>
        </div>
        <div id="center">
            <div id = "vcenter">
                <div id="vtop"></div>
                <div id="header">
                    <div class="top" id="weatherContainer" onclick="toggleVisibility('weatherContainer', 'title');" style="cursor: pointer;">
                        <div id="weather"></div>
                        <div id="weather2"></div>
                    </div>
                    <div class="top" id="title">
                        <p id ="titletext" class="bracket" onclick="loadWeather(); toggleVisibility('title', 'weatherContainer');" style="cursor: pointer;">こんにちは!</p>
                    </div>
                </div>
                <div id="searchContainer">
                    <form class="searchForm search_0 searchView" method="get" action="https://google.com/search">
                        <input class="searchBar search_0_i search_google" type="text" name="q" placeholder="Google" autofocus="autofocus" />
                    </form>
                    <form class="searchForm search_1" method="get" action="https://youtube.com/results">
                        <input class="searchBar search_1_i search_youtube" type="text" name="search_query" placeholder="YouTube" />
                    </form>
                    <form class="searchForm search_2" method="get" action="https://en.wikipedia.org/w/index.php">
                        <input class="searchBar search_2_i search_wikipedia" type="text" name="search" placeholder="Wikipedia" />
                    </form>

                    <div class="dotstyle dotstyle-fillup">
                        <ul>
                            <li id="dot_0" onclick="selectSearch(0);" class="current" ><a href="#">Google</a></li>
                            <li id="dot_1" onclick="selectSearch(1);"><a href="#">YouTube</a></li>
                            <li id="dot_2" onclick="selectSearch(2);"><a href="#">Wikipedia</a></li>
                        </ul>
                    </div>
                </div>
                <div id="links">
                    <div class="d1x1">
                        <h1 class="bracket">News</h1>
                        <a href="http://www.tweakers.net/">Tweakers</a> <br />
                        <a href="http://nos.nl/">NOS.nl</a> <br />
                        <a href="http://www.nu.nl/">nu.nl</a> <br />
                    </div>

                    <div class="d1x1">
                        <h1 class="bracket">Boards</h1>
                        <a href="https://8ch.net/animus/">/animus/ - Circlejerk</a> <br />
                        <a href="https://boards.4chan.org/g/">/g/ - Technology</a> <br />
                    </div>

                    <div class="d1x1">
                        <h1 class="bracket">Media</h1>
                        <a href="https://www.youtube.com/feed/subscriptions/">YouTube</a> <br />
                        <a href="http://www.soundcloud.com/">SoundCloud</a> <br />
                    </div>

                    <div class="d1x1">
                        <h1 class="bracket">HZ</h1>
                        <a href="https://my.hz.nl/">HZ Portal</a> <br />
                        <a href="https://mail.hz.nl/">Webmail</a> <br />
                    </div>

                    <div class="d1x1">
                        <h1 class="bracket">Animus</h1>
                        <a href="http://myanimelist.net/">My Anime List</a> <br />
                        <a href="http://kissanime.ru/">Anime Streaming</a> <br />
                    </div>

                    <div class="d1x1">
                        <h1 class="bracket">Mail</h1>
                        <a href="http://mail.google.com">Gmail</a> <br />
                        <a href="https://ox.pcextreme.nl">PCX Mail</a> <br />
                        <a href="https://mail.hz.nl/">HZ Mail</a> <br />
                        <a href="https://outlook.live.com/">Spam Mail</a> <br />
                    </div>

                    <div class="d1x1">
                        <h1 class="bracket">Hosting</h1>
                        <a href="https://files.dorifuto.moe/">NextCloud</a> <br />
                        <a href="https://mixtape.moe/">mixtape.moe</a> <br />
                        <a href="https://github.com/tsudoko/long-live-pomf/blob/master/long-live-pomf.md">pomf forever</a> <br />
                        <a href="http://imgur.com">imgur</a> <br />
                    </div>

                    <div class="d1x1">
                        <h1 class="bracket">Misc</h1>
                        <a href="https://github.com/markdingemanse">selfGit</a> <br />
                        <a href="https://www.reddit.com/r/symphonicmetal/">R/Symphometal</a> <br />

                    </div>
                </div> <!-- links -->
                <div id="feeds">
                    <div class="d2x1" id="todo">
                        <h1 class="bracket" style="cursor: pointer;" onclick="saveTodo();">Todo</h1>
                            <form method="post" >
                                <textarea id="todobox" name="comments">
                                </textarea>
                            </form>
                    </div>

                    <div class="d2x1">
                        <h1> <a href="http://nu.nl/" class="bracket">NU.nl</a></h1>
                        <div class="d2x1Child" id="nu"></div>
                    </div>

                    <div class="d2x1">
                        <h1><a href="http://nos.nl/" class="bracket">NOS Nieuws</a></h1>
                        <div class="d2x1Child" id="nos"></div>
                    </div>

                    <div class="d2x1">
                        <h1><a href="http://www.tweakers.net/" class="bracket">Tweakers</a></h1>
                        <div class="d2x1Child" id="tweakers"></div>
                    </div>
                </div> <!--feeds-->

                <div id="condfeeds">
                    <div class="d4x2" id="xkcdContainer">
                        <h1><a href="http://www.xkcd.com/" class="bracket">xkcd</a></h1>
                        <div id="xkcd"></div>
                        <div id="xkcdDate"></div>
                    </div>
                    <div class="d4x2" id="whatifContainer">
                        <h1><a href="http://what-if.xkcd.com/" class="bracket">What If?</a></h1>
                        <div id="whatif"></div>
                        <div id="whatifDate"></div>
                    </div>
                    <div class="d4x2" id="prequelContainer">
                        <h1><a href="http://www.prequeladventure.com/" class="bracket">PREQUEL</a></h1>
                        <div id="prequel"></div>
                        <div id="prequelDate"></div>
                    </div>
                </div> <!-- condfeeds -->
                <div id="vbottom" onclick="expand('dong');">
                    <div class="arrow-down"></div>
                </div>
            </div> <!-- vcenter -->
        </div> <!-- center -->

        <div id="bottom-margin"></div>

        <script src="js/all.js"></script>
        <script type="text/javascript">

        const url='http://homepage.test/randomfile';
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                randomFile = xhttp.responseText;
                // console.log(document.querySelector('.bg').classList);
                // document.querySelector('.bg').classList.add(randomFile);
                var imgcss = "url('/img/" + randomFile + "')";
                console.log(imgcss);
                document.body.style.backgroundImage = imgcss;

                var date = new Date();
                var hour = date.getHours();
                var bgpath = "/img/" + randomFile;
                var image = document.createElement("img");
                
                image.id = "bgimg";
                image.src = bgpath;

                var rgb;
                image.onload = function() {
                            rgb = getAverageRGB(image);
                            var meta = document.createElement('meta');
                            meta.name = "theme-color";
                            meta.content = 'rgb('+rgb.r+','+rgb.g+','+rgb.b+')';
                            document.getElementsByTagName('head')[0].appendChild(meta);
                }

                // Header title
                if ( hour >= 3 && hour < 10 ) {
                    document.getElementById("titletext").innerHTML = "おはよう!";
                }
                if ( hour >= 10 && hour < 18 ) {
                    document.getElementById("titletext").innerHTML = "こんにちは!";
                }
                if ( hour >= 18 || hour < 3 ) {
                    document.getElementById("titletext").innerHTML = "こんばんは!";
                }
            }
        };
        xhttp.open("GET", url, true);
        xhttp.send();







        //
        //
        // Http.open("GET", url);
        // Http.send();
        // Http.onreadystatechange=(e)=>{
        //     if (this.readyState == 4 && this.status == 200) {
        //         randomFile = Http.responseText;
        //         console.log(randomFile);
        //         // Randomize background
        //         var date = new Date();
        //         var hour = date.getHours();
        //         var bgpath = "img/" + randomFile;
        //         // var bgpath = "img/";
        //         // if ( hour > 6 && hour < 18 ) {
        //         //     var bgd = [ 'bgd1', 'bgd2', 'bgd3', 'bgd4', 'bgd5', 'bgd6', 'bgd7', 'bgd8', 'bgd9', 'bgd10', 'bgd11', 'bgd12', 'bgd12' ];
        //         //     var bgd = bgd[Math.floor(Math.random() * bgd.length)];
        //         //     document.querySelector('.bg').classList.add(bgd);
        //         //     bgpath += bgd;
        //         // }
        //         // else {
        //         //     var bgn = [ 'bgn1', 'bgn2', 'bgn3', 'bgn4', 'bgn5', 'bgn6', 'bgn7', 'bgn8', 'bgn9', 'bgn10', 'bgn11', 'bgn12', 'bgn13', 'bgn14', 'bgn15' ];
        //         //     var bgn = bgn[Math.floor(Math.random() * bgn.length)];
        //         //     document.querySelector('.bg').classList.add(bgn);
        //         //     bgpath += bgn;
        //         // }
        //         // bgpath += ".jpg";
        //
        //         var image = document.createElement("img");
        //         image.id = "bgimg";
        //         image.src = bgpath;
        //
        //         // Chrome color
        //         var rgb;
        //         image.onload = function() {
        //                     rgb = getAverageRGB(image);
        //                     var meta = document.createElement('meta');
        //                     meta.name = "theme-color";
        //                     meta.content = 'rgb('+rgb.r+','+rgb.g+','+rgb.b+')';
        //                     document.getElementsByTagName('head')[0].appendChild(meta);
        //         }
        //
        //         // Header title
        //         if ( hour >= 3 && hour < 10 ) {
        //             document.getElementById("titletext").innerHTML = "おはよう!";
        //         }
        //         if ( hour >= 10 && hour < 18 ) {
        //             document.getElementById("titletext").innerHTML = "こんにちは!";
        //         }
        //         if ( hour >= 18 || hour < 3 ) {
        //             document.getElementById("titletext").innerHTML = "こんばんは!";
        //         }
        //     }
        // }



        </script>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    </body>
</html>
