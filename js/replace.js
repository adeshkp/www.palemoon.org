/* Dynamic external JS and CSS replacer

   Copyright ©2015 M.C. Straver BASc

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
*/


function Create_JS_CSS_Element(filename, filetype) {
    if (filetype == "css") {
        // If the file is an external CSS file
        var fileref = document.createElement("link")
        fileref.setAttribute("rel", "stylesheet")
        fileref.setAttribute("type", "text/css")
        fileref.setAttribute("href", filename)
    }
    else if (filetype == "js") {
        // If the file is a external JavaScript file
        var fileref = document.createElement('script')
        fileref.setAttribute("type","text/javascript")
        fileref.setAttribute("src", filename)
    }
    return fileref
}
 
function Replace_JS_CSS(oldfilename, newfilename, filetype) {
    // Determine the element type to create in the node list
    var targetelement = (filetype == "js") ? "script" : (filetype == "css") ? "link" : "none"
    // Determine the corresponding attribute to use for the element
    var targetattr = (filetype == "js") ? "src" : (filetype == "css") ? "href" : "none"
    
    var suspects = document.getElementsByTagName(targetelement)
    // Search backwards through the node list for matching elements to remove
    for (var i=allsuspects.length; i>=0; i--){
        if (allsuspects[i] && allsuspects[i].getAttribute(targetattr) != null &&
            allsuspects[i].getAttribute(targetattr).indexOf(oldfilename) != -1) {
            // Create the element and replace the node
            var newelement = Create_JS_CSS_Element(newfilename, filetype);
            allsuspects[i].parentNode.replaceChild(newelement, allsuspects[i]);
        }
    }
}
 
/* Examples:
Replace_JS_CSS("oldstyle.css", "newstyle.css", "css") // Replace all occurences "oldstyle.css" with "newstyle.css"
Replace_JS_CSS("oldscript.js", "newscript.js", "js") // Replace all occurences of "oldscript.js" with "newscript.js"
*/