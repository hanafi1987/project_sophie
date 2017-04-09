tinymce.PluginManager.add("lists",function(e){function t(t){return e.$.contains(e.getBody(),t)}function n(e){return e&&"BR"==e.nodeName}function r(e){return e&&/^(OL|UL|DL)$/.test(e.nodeName)&&t(e)}function i(e){return e&&/^(LI|DT|DD)$/.test(e.nodeName)}function o(e){return e.parentNode.firstChild==e}function a(e){return e.parentNode.lastChild==e}function s(t){return t&&!!e.schema.getTextBlockElements()[t.nodeName]}function l(t){return t===e.getBody()}function c(e){return e&&3===e.nodeType}function u(e,t){var n=tinymce.dom.RangeUtils.getNode(e,t);if(i(e)&&c(n)){var r=t>=e.childNodes.length?n.data.length:0;return{container:n,offset:r}}return{container:e,offset:t}}function d(e){var t=e.cloneRange(),n=u(e.startContainer,e.startOffset);t.setStart(n.container,n.offset);var r=u(e.endContainer,e.endOffset);return t.setEnd(r.container,r.offset),t}var f=this;e.on("init",function(){function c(e,t){var n=L.isEmpty(e);return!(t&&L.select("span[data-mce-type=bookmark]").length>0)&&n}function u(e){function t(t){var r,i,o;i=e[t?"startContainer":"endContainer"],o=e[t?"startOffset":"endOffset"],1==i.nodeType&&(r=L.create("span",{"data-mce-type":"bookmark"}),i.hasChildNodes()?(o=Math.min(o,i.childNodes.length-1),t?i.insertBefore(r,i.childNodes[o]):L.insertAfter(r,i.childNodes[o])):i.appendChild(r),i=r,o=0),n[t?"startContainer":"endContainer"]=i,n[t?"startOffset":"endOffset"]=o}var n={};return t(!0),e.collapsed||t(),n}function h(e){function t(t){function n(e){for(var t=e.parentNode.firstChild,n=0;t;){if(t==e)return n;1==t.nodeType&&"bookmark"==t.getAttribute("data-mce-type")||n++,t=t.nextSibling}return-1}var r,i,o;r=o=e[t?"startContainer":"endContainer"],i=e[t?"startOffset":"endOffset"],r&&(1==r.nodeType&&(i=n(r),r=r.parentNode,L.remove(o)),e[t?"startContainer":"endContainer"]=r,e[t?"startOffset":"endOffset"]=i)}t(!0),t();var n=L.createRng();n.setStart(e.startContainer,e.startOffset),e.endContainer&&n.setEnd(e.endContainer,e.endOffset),M.setRng(d(n))}function p(t,n){var r,i,o,a=L.createFragment(),s=e.schema.getBlockElements();if(e.settings.forced_root_block&&(n=n||e.settings.forced_root_block),n&&(i=L.create(n),i.tagName===e.settings.forced_root_block&&L.setAttribs(i,e.settings.forced_root_block_attrs),a.appendChild(i)),t)for(;r=t.firstChild;){var l=r.nodeName;o||"SPAN"==l&&"bookmark"==r.getAttribute("data-mce-type")||(o=!0),s[l]?(a.appendChild(r),i=null):n?(i||(i=L.create(n),a.appendChild(i)),i.appendChild(r)):a.appendChild(r)}return e.settings.forced_root_block?o||tinymce.Env.ie&&!(tinymce.Env.ie>10)||i.appendChild(L.create("br",{"data-mce-bogus":"1"})):a.appendChild(L.create("br")),a}function m(){return tinymce.grep(M.getSelectedBlocks(),function(e){return i(e)})}function g(e,t,n){function r(e){tinymce.each(a,function(n){e.parentNode.insertBefore(n,t.parentNode)}),L.remove(e)}var i,o,a,s;for(a=L.select('span[data-mce-type="bookmark"]',e),n=n||p(t),i=L.createRng(),i.setStartAfter(t),i.setEndAfter(e),o=i.extractContents(),s=o.firstChild;s;s=s.firstChild)if("LI"==s.nodeName&&L.isEmpty(s)){L.remove(s);break}L.isEmpty(o)||L.insertAfter(o,e),L.insertAfter(n,e),c(t.parentNode)&&r(t.parentNode),L.remove(t),c(e)&&L.remove(e)}function v(e){var t,n;if(t=e.nextSibling,t&&r(t)&&t.nodeName==e.nodeName&&P(e,t)){for(;n=t.firstChild;)e.appendChild(n);L.remove(t)}if(t=e.previousSibling,t&&r(t)&&t.nodeName==e.nodeName&&P(e,t)){for(;n=t.lastChild;)e.insertBefore(n,e.firstChild);L.remove(t)}}function y(e){tinymce.each(tinymce.grep(L.select("ol,ul",e)),b)}function b(e){var t,n=e.parentNode;"LI"==n.nodeName&&n.firstChild==e&&(t=n.previousSibling,t&&"LI"==t.nodeName?(t.appendChild(e),c(n)&&L.remove(n)):L.setStyle(n,"listStyleType","none")),r(n)&&(t=n.previousSibling,t&&"LI"==t.nodeName&&t.appendChild(e))}function C(e){function t(e){c(e)&&L.remove(e)}var n,i=e.parentNode,s=i.parentNode;return!!l(i)||("DD"==e.nodeName?(L.rename(e,"DT"),!0):o(e)&&a(e)?("LI"==s.nodeName?(L.insertAfter(e,s),t(s),L.remove(i)):r(s)?L.remove(i,!0):(s.insertBefore(p(e),i),L.remove(i)),!0):o(e)?("LI"==s.nodeName?(L.insertAfter(e,s),e.appendChild(i),t(s)):r(s)?s.insertBefore(e,i):(s.insertBefore(p(e),i),L.remove(e)),!0):a(e)?("LI"==s.nodeName?L.insertAfter(e,s):r(s)?L.insertAfter(e,i):(L.insertAfter(p(e),i),L.remove(e)),!0):("LI"==s.nodeName?(i=s,n=p(e,"LI")):n=r(s)?p(e,"LI"):p(e),g(i,e,n),y(i.parentNode),!0))}function x(e){function t(t,n){var i;if(r(t)){for(;i=e.lastChild.firstChild;)n.appendChild(i);L.remove(t)}}var n,i,o;return"DT"==e.nodeName?(L.rename(e,"DD"),!0):(n=e.previousSibling,n&&r(n)?(n.appendChild(e),!0):n&&"LI"==n.nodeName&&r(n.lastChild)?(n.lastChild.appendChild(e),t(e.lastChild,n.lastChild),!0):(n=e.nextSibling,n&&r(n)?(n.insertBefore(e,n.firstChild),!0):(n=e.previousSibling,!(!n||"LI"!=n.nodeName)&&(i=L.create(e.parentNode.nodeName),o=L.getStyle(e.parentNode,"listStyleType"),o&&L.setStyle(i,"listStyleType",o),n.appendChild(i),i.appendChild(e),t(e.lastChild,i),!0))))}function w(){var t=m();if(t.length){for(var n=u(M.getRng(!0)),r=0;r<t.length&&(x(t[r])||0!==r);r++);return h(n),e.nodeChanged(),!0}}function E(){var t=m();if(t.length){var n,r,i=u(M.getRng(!0)),o=e.getBody();for(n=t.length;n--;)for(var a=t[n].parentNode;a&&a!=o;){for(r=t.length;r--;)if(t[r]===a){t.splice(n,1);break}a=a.parentNode}for(n=0;n<t.length&&(C(t[n])||0!==n);n++);return h(i),e.nodeChanged(),!0}}function N(t,i){function o(){function t(e){var t,n;for(t=l[e?"startContainer":"endContainer"],n=l[e?"startOffset":"endOffset"],1==t.nodeType&&(t=t.childNodes[Math.min(n,t.childNodes.length-1)]||t);t.parentNode!=o;){if(s(t))return t;if(/^(TD|TH)$/.test(t.parentNode.nodeName))return t;t=t.parentNode}return t}for(var r,i=[],o=e.getBody(),a=t(!0),c=t(),u=[],d=a;d&&(u.push(d),d!=c);d=d.nextSibling);return tinymce.each(u,function(e){if(s(e))return i.push(e),void(r=null);if(L.isBlock(e)||n(e))return n(e)&&L.remove(e),void(r=null);var t=e.nextSibling;return tinymce.dom.BookmarkManager.isBookmarkNode(e)&&(s(t)||!t&&e.parentNode==o)?void(r=null):(r||(r=L.create("p"),e.parentNode.insertBefore(r,e),i.push(r)),void r.appendChild(e))}),i}var a,l=M.getRng(!0),c="LI";"false"!==L.getContentEditable(M.getNode())&&(t=t.toUpperCase(),"DL"==t&&(c="DT"),a=u(l),tinymce.each(o(),function(e){var n,o,a=function(e){var t=L.getStyle(e,"list-style-type"),n=i?i["list-style-type"]:"";return n=null===n?"":n,t===n};o=e.previousSibling,o&&r(o)&&o.nodeName==t&&a(o)?(n=o,e=L.rename(e,c),o.appendChild(e)):(n=L.create(t),e.parentNode.insertBefore(n,e),n.appendChild(e),e=L.rename(e,c)),O(n,i),v(n)}),h(a))}function _(){var t=u(M.getRng(!0)),n=e.getBody(),i=m(),o=tinymce.util.Tools.grep(i,function(e){return c(e)});i=tinymce.util.Tools.grep(i,function(e){return!c(e)}),tinymce.each(o,function(e){if(c(e))return void C(e)}),tinymce.each(i,function(e){var t,i;if(!l(e.parentNode)){for(t=e;t&&t!=n;t=t.parentNode)r(t)&&(i=t);g(i,e),y(i.parentNode)}}),h(t)}function S(e,t){var n=L.getParent(M.getStart(),"OL,UL,DL");if(!l(n))if(n)if(n.nodeName==e)_(e);else{var r=u(M.getRng(!0));O(n,t),v(L.rename(n,e)),h(r)}else N(e,t)}function k(t){return function(){var n=L.getParent(e.selection.getStart(),"UL,OL,DL");return n&&n.nodeName==t}}function T(e){return!!n(e)&&!(!L.isBlock(e.nextSibling)||n(e.previousSibling))}function R(t,n){var r,i,o=t.startContainer,a=t.startOffset;if(3==o.nodeType&&(n?a<o.data.length:a>0))return o;for(r=e.schema.getNonEmptyElements(),1==o.nodeType&&(o=tinymce.dom.RangeUtils.getNode(o,a)),i=new tinymce.dom.TreeWalker(o,e.getBody()),n&&T(o)&&i.next();o=i[n?"next":"prev2"]();){if("LI"==o.nodeName&&!o.hasChildNodes())return o;if(r[o.nodeName])return o;if(3==o.nodeType&&o.data.length>0)return o}}function A(e,i){var o,a,s=e.parentNode;if(t(e)&&t(i)){if(r(i.lastChild)&&(a=i.lastChild),s==i.lastChild&&n(s.previousSibling)&&L.remove(s.previousSibling),o=i.lastChild,o&&n(o)&&e.hasChildNodes()&&L.remove(o),c(i,!0)&&L.$(i).empty(),!c(e,!0))for(;o=e.firstChild;)i.appendChild(o);a&&i.appendChild(a),L.remove(e),c(s)&&!l(s)&&L.remove(s)}}function B(e){var t,n,r,i=L.getParent(M.getStart(),"LI");if(i){if(t=i.parentNode,l(t)&&L.isEmpty(t))return!0;if(n=d(M.getRng(!0)),r=L.getParent(R(n,e),"LI"),r&&r!=i){var o=u(n);return e?A(r,i):A(i,r),h(o),!0}if(!r&&!e&&_(t.nodeName))return!0}}function D(){var t=e.dom.getParent(e.selection.getStart(),"LI,DT,DD");return!!(t||m().length>0)&&(e.undoManager.transact(function(){e.execCommand("Delete"),y(e.getBody())}),!0)}var L=e.dom,M=e.selection,P=function(t,n){var r=e.dom.getStyle(t,"list-style-type",!0),i=e.dom.getStyle(n,"list-style-type",!0);return r===i},O=function(e,t){L.setStyle(e,"list-style-type",t?t["list-style-type"]:null)};f.backspaceDelete=function(e){return M.isCollapsed()?B(e):D()},e.on("BeforeExecCommand",function(t){var n,r=t.command.toLowerCase();if("indent"==r?w()&&(n=!0):"outdent"==r&&E()&&(n=!0),n)return e.fire("ExecCommand",{command:t.command}),t.preventDefault(),!0}),e.addCommand("InsertUnorderedList",function(e,t){S("UL",t)}),e.addCommand("InsertOrderedList",function(e,t){S("OL",t)}),e.addCommand("InsertDefinitionList",function(e,t){S("DL",t)}),e.addQueryStateHandler("InsertUnorderedList",k("UL")),e.addQueryStateHandler("InsertOrderedList",k("OL")),e.addQueryStateHandler("InsertDefinitionList",k("DL")),e.on("keydown",function(t){9!=t.keyCode||tinymce.util.VK.metaKeyPressed(t)||e.dom.getParent(e.selection.getStart(),"LI,DT,DD")&&(t.preventDefault(),t.shiftKey?E():w())})});var h=function(t){return function(){var n=this;e.on("NodeChange",function(e){var i=tinymce.util.Tools.grep(e.parents,r);n.active(i.length>0&&i[0].nodeName===t)})}},p=function(e,t){var n=e.settings.plugins?e.settings.plugins:"";return tinymce.util.Tools.inArray(n.split(/[ ,]/),t)!==-1};p(e,"advlist")||(e.addButton("numlist",{title:"Numbered list",cmd:"InsertOrderedList",onPostRender:h("OL")}),e.addButton("bullist",{title:"Bullet list",cmd:"InsertUnorderedList",onPostRender:h("UL")})),e.addButton("indent",{icon:"indent",title:"Increase indent",cmd:"Indent",onPostRender:function(){var t=this;e.on("nodechange",function(){for(var n=e.selection.getSelectedBlocks(),r=!1,i=0,a=n.length;!r&&i<a;i++){var s=n[i].nodeName;r="LI"==s&&o(n[i])||"UL"==s||"OL"==s||"DD"==s}t.disabled(r)})}}),e.on("keydown",function(e){e.keyCode==tinymce.util.VK.BACKSPACE?f.backspaceDelete()&&e.preventDefault():e.keyCode==tinymce.util.VK.DELETE&&f.backspaceDelete(!0)&&e.preventDefault()})});