tinymce.PluginManager.add("noneditable",function(e){function t(e){return function(t){return(" "+t.attr("class")+" ").indexOf(e)!==-1}}function n(t){function n(t){var n=arguments,r=n[n.length-2],i=r>0?a.charAt(r-1):"";if('"'===i)return t;if(">"===i){var o=a.lastIndexOf("<",r);if(o!==-1){var l=a.substring(o,r);if(l.indexOf('contenteditable="false"')!==-1)return t}}return'<span class="'+s+'" data-mce-content="'+e.dom.encode(n[0])+'">'+e.dom.encode("string"==typeof n[1]?n[1]:n[0])+"</span>"}var r=o.length,a=t.content,s=tinymce.trim(i);if("raw"!=t.format){for(;r--;)a=a.replace(o[r],n);t.content=a}}var r,i,o,a="contenteditable";r=" "+tinymce.trim(e.getParam("noneditable_editable_class","mceEditable"))+" ",i=" "+tinymce.trim(e.getParam("noneditable_noneditable_class","mceNonEditable"))+" ";var s=t(r),l=t(i);o=e.getParam("noneditable_regexp"),o&&!o.length&&(o=[o]),e.on("PreInit",function(){o&&e.on("BeforeSetContent",n),e.parser.addAttributeFilter("class",function(e){for(var t,n=e.length;n--;)t=e[n],s(t)?t.attr(a,"true"):l(t)&&t.attr(a,"false")}),e.serializer.addAttributeFilter(a,function(e){for(var t,n=e.length;n--;)t=e[n],(s(t)||l(t))&&(o&&t.attr("data-mce-content")?(t.name="#text",t.type=3,t.raw=!0,t.value=t.attr("data-mce-content")):t.attr(a,null))})})});