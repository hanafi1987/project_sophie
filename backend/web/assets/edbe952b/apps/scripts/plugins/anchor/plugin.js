tinymce.PluginManager.add("anchor",function(e){var t=function(e){return!e.attr("href")&&(e.attr("id")||e.attr("name"))&&!e.firstChild},n=function(e){return function(n){for(var r=0;r<n.length;r++)t(n[r])&&n[r].attr("contenteditable",e)}},r=function(){var t=e.selection.getNode(),n="A"==t.tagName&&""===e.dom.getAttrib(t,"href"),r="";n&&(r=t.id||t.name||""),e.windowManager.open({title:"Anchor",body:{type:"textbox",name:"id",size:40,label:"Id",value:r},onsubmit:function(r){var i=r.data.id;n?(t.removeAttribute("name"),t.id=i):(e.selection.collapse(!0),e.execCommand("mceInsertContent",!1,e.dom.createHTML("a",{id:i})))}})};tinymce.Env.ceFalse&&e.on("PreInit",function(){e.parser.addNodeFilter("a",n("false")),e.serializer.addNodeFilter("a",n(null))}),e.addCommand("mceAnchor",r),e.addButton("anchor",{icon:"anchor",tooltip:"Anchor",onclick:r,stateSelector:"a:not([href])"}),e.addMenuItem("anchor",{icon:"anchor",text:"Anchor",context:"insert",onclick:r})});