(function($){
    $.sbCookieConsentBar=function(options,val){

        if(options=='cookies'){
            var doReturn='cookies';}

        else if(options=='set'){
            var doReturn='set';}

        else{
        var doReturn=false;}
        
        var defaults={
            message:'En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de Cookies.',
            acceptButton:true,
            acceptText:'Accepter',
            declineButton:false,
            declineText:'Refuser',
            policyButton:false,
            policyText:'Information sur les cookies',
            policyURL:'/cookies/',
            autoEnable:true,
            acceptOnContinue:false,
            expireDays:365,
            forceShow:false,
            effect:'slide',
            element:'body',
            append:false,
            fixed:true,
            bottom:true,
            zindex:'',
            redirect:String(window.location.href),
            domain:String(window.location.hostname),
            referrer:String(document.referrer)};
        
        var options=$.extend(defaults,options);
        var expireDate=new Date();
        
        expireDate.setTime(expireDate.getTime()+(options.expireDays*24*60*60*1000));
        
        expireDate=expireDate.toGMTString();
        
        var cookieEntry='cookies-consent-bar-enabled={value};expires='+expireDate+';path=/';
        var i,cookieValue='',aCookie,aCookies=document.cookie.split('; ');
        for(i=0;i<aCookies.length;i++){
            aCookie=aCookies[i].split('=');
            if(aCookie[0]=='cookies-consent-bar-enabled'){
                cookieValue=aCookie[1]}
        }
        if(cookieValue==''&&options.autoEnable){
            cookieValue='enabled';
            document.cookie=cookieEntry.replace('{value}','enabled')}
        
        if(options.acceptOnContinue){
            if(options.referrer.indexOf(options.domain)>=0&&String(window.location.href).indexOf(options.policyURL)==-1&&doReturn!='cookies'&&doReturn!='set'&&cookieValue!='accepted'&&cookieValue!='declined'){
                doReturn='set';
                val='accepted'}
            }
        if(doReturn=='cookies'){
            if(cookieValue=='enabled'||cookieValue=='accepted'){
                return true}
            else{return false}
        }
        else if(doReturn=='set'&&(val=='accepted'||val=='declined')){
            document.cookie=cookieEntry.replace('{value}',val);
            if(val=='accepted'){
                return true}
            else{return false}
        }else{
            var message=options.message.replace('{policy_url}',options.policyURL);
            if(options.acceptButton){
                var acceptButton='<a href="" class="sb-enable">'+options.acceptText+'</a>'}

            else{
                var acceptButton=''}

            if(options.declineButton){
                var declineButton='<a href="" class="sb-disable">'+options.declineText+'</a>'}

            else{var declineButton=''}

            if(options.policyButton){
                var policyButton='<a href="'+options.policyURL+'" class="sb-policy">'+options.policyText+'</a>'}

            else{var policyButton=''}

            if(options.fixed){

                if(options.bottom){
                    var fixed=' class="fixed bottom"'}

                else{
                    var fixed=' class="fixed"'}
            }

            else{var fixed=''}

            if(options.zindex!=''){
                var zindex=' style="z-index:'+options.zindex+';"'}
            
            else{var zindex=''}
            
            if(options.forceShow||cookieValue=='enabled'||cookieValue==''){

                if(options.append){
                    $(options.element).append('<div id="ecranNoir"><div id="cookie-consent-bar"'+fixed+zindex+'><p>'+message+'<br><br>'+acceptButton+declineButton+policyButton+'</p></div></div>')}
                
                else{
                    $(options.element).prepend('<div id="ecranNoir"><div id="cookie-consent-bar"'+fixed+zindex+'><p>'+message+'<br><br>'+acceptButton+declineButton+policyButton+'</p></div></div>')}
            }
            
            $('#cookie-consent-bar .sb-enable').click(function(){document.cookie=cookieEntry.replace('{value}','accepted');
                if(cookieValue!='enabled'&&cookieValue!='accepted'){
                    window.location=options.currentLocation}
                else{

                    if(options.effect=='slide'){
                        $('#cookie-consent-bar').slideUp(300,function(){$('#cookie-consent-bar').remove()});
                        $('#ecranNoir').slideUp(300,function(){$('#ecranNoir').remove()});
                    }
                    
                    else if(options.effect=='fade'){
                        $('#cookie-consent-bar').fadeOut(300,function(){$('#cookie-consent-bar').remove()});
                        $('#ecranNoir').fadeOut(300,function(){$('#ecranNoir').remove()});
                    }
                    
                    else{
                        $('#cookie-consent-bar').hide(0,function(){$('#cookie-consent-bar').remove()});
                        $('#ecranNoir').hide(0,function(){$('#ecranNoir').remove()});
                    }
                    
                    return false}
            });
            
            $('#cookie-consent-bar .sb-disable').click(function(){
                var deleteDate=new Date();
                deleteDate.setTime(deleteDate.getTime()-(864000000));
                deleteDate=deleteDate.toGMTString();
                aCookies=document.cookie.split('; ');
                for(i=0;i<aCookies.length;i++){
                    aCookie=aCookies[i].split('=');
                    if(aCookie[0].indexOf('_')>=0){
                        document.cookie=aCookie[0]+'=0; expires='+deleteDate+'; domain='+options.domain.replace('www','')+'; path=/'
                    }
                    else{
                        document.cookie=aCookie[0]+'=0; expires='+deleteDate+'; path=/'
                    }
                }
                document.cookie=cookieEntry.replace('{value}','declined');
                if(cookieValue==''&&cookieValue!='declined'){
                    window.location=options.currentLocation}
                else{
                    if(options.effect=='slide'){
                        $('#cookie-consent-bar').slideUp(300,function(){$('#cookie-consent-bar').remove()});
                        $('#ecranNoir').slideUp(300,function(){$('#ecranNoir').remove()});
                    }
                    else if(options.effect=='fade'){
                        $('#cookie-consent-bar').fadeOut(300,function(){$('#cookie-consent-bar').remove()});
                        $('#ecranNoir').fadeOut(300,function(){$('#ecranNoir').remove()});
                    }
                    else{
                        $('#cookie-consent-bar').hide(0,function(){$('#cookie-consent-bar').remove()});
                        $('#ecranNoir').hide(0,function(){$('#ecranNoir').remove()});
                    }return false
                }
            })
        }
    }
})(jQuery);