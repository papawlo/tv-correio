<?php get_header(); ?>
<script type="text/javascript" src="http://www.crosshost.com.br/dvr/lib/swfobject.js"></script>
<script type="text/javascript" src="http://www.crosshost.com.br/dvr/lib/ParsedQueryString.js"></script>
<div id="player">
    <div id="tvcorreio">
        
        <h1>instale o flash player</h1>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
    </div>
</div>
<script type="text/javascript">
    var pqs = new ParsedQueryString();
    var parameterNames = pqs.params(false);
    var parameters = {
        src: "http://174.37.99.198:1935/dvrid1816/1816/manifest.f4m?DVR",
        expandedBufferTime: 5,
        liveBufferTime: 12,
        liveDynamicStreamingBufferTime: 14,
        dvrBufferTime: 12,
        dvrDynamicStreamingBufferTime: 14,
        dynamicStreamBufferTime: 14,
        autoPlay: "False",
        verbose: "false",
        controlBarAutoHide: "false",
        controlBarPosition: "bottom"
    };

    for (var i = 0; i < parameterNames.length; i++) {
        var parameterName = parameterNames[i];
        parameters[parameterName] = pqs.param(parameterName) || parameters[parameterName];
    }

    var wmodeValue = "direct";
    var wmodeOptions = ["direct", "opaque", "transparent", "window"];

    if (parameters.hasOwnProperty("wmode")) {
        if (wmodeOptions.indexOf(parameters.wmode) >= 0) {
            wmodeValue = parameters.wmode;
        }
        delete parameters.wmode;
    }

    swfobject.embedSWF(
            "http://sitescorreio.com.br/dominios/tvcorreio/StrobeMediaPlayback.swf", "tvcorreio", 597, 483, "10.3.0", "ExpressInstall.swf", parameters, {allowFullScreen: "true", wmode: wmodeValue}, {name: "StrobeMediaPlayback"}
    );
</script>
<style type="text/css">
    #player {
        margin: 60px auto 0;
        width: 597px;
        height: 483px;	
    }
</style>
<?php get_footer(); ?>