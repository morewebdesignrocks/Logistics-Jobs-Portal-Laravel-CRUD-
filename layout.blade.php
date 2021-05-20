<!DOCTYPE html>
<html lang="en">
   <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <!-- Style -->
        <style>
            body {
                margin: 0 auto;
            }
            /* Font Sizing */
            h1 {
                font-size: 1.5em;
            }
            h2 {
                font-size: 1.3em;
            }
            /* Container */
            .container {
                padding-left: 0;
                padding-right: 0;
            }
            /* Nav Bar */
            .navbar-brand img {
                max-width: 120px;
            }
            .navbar {
                border-bottom: solid 3px #F29F05;
            }
            #mobile-nav-toggler {
                display: none;
                border: none;
                border-radius: 2px;
                background-color: #0d1f61;
                padding: 5px 7px;
                color: #fff;
            }
            /* Cards */
            .card {
                margin: 30px 16px;
            }
            .card-header {
                color: #ffffff;
                background-color: #1b4c8c;
            }
            /* Tables */
            .table-header {
                position: sticky;
            }
            /* Footer */
            footer {
                color: #ffffff;
                padding: 30px 16px;
                background-color: #141414;
                border-top: solid 3px #F29F05;
            }
            /* ===== MEDIA QUERIES ===== */
            /* Medium devices (tablets, less than 992px) */
            @media (max-width: 991.98px) { 
                #mobile-nav-toggler {
                    display: block;
                }
            }
        </style>
        
        <title>{{ config('app.name') }}</title>
   </head>
   <body>
        <header class="container">
            @include('includes.header')
        </header>
        <div class="container">
            @yield('content')
        </div>
        <footer class="container">
            @include('includes.footer')
        </footer>

        <!-- JavaScript -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/js"></script>
        <script src="https://kit.fontawesome.com/aa7ee88283.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/javascript" href="{{ url('/js/app.js') }}">
        
        <!-- Functions thst should go in /js/app.js -->
        <script type="text/javascript">

            /* Load function on window on load */
            window.onload = function() {
                
                /* Mobile Menu Toggle */
                let toggleHamburger = document.getElementById("mobile-nav-toggler");
                let toggleMenu = document.getElementById("mobile-nav-content");
    
                toggleHamburger.addEventListener("click", hasClass);

                function hasClass() {

                    /* Add polyfill to support classList function on IE */
                    // 1. String.prototype.trim polyfill
                    if (!"".trim) String.prototype.trim = function(){ return this.replace(/^[\s]+|[\s]+$/g, ''); };
                    (function(window){"use strict"; // prevent global namespace pollution
                    if(!window.DOMException) (DOMException = function(reason){this.message = reason}).prototype = new Error;
                    var wsRE = /[\11\12\14\15\40]/, wsIndex = 0, checkIfValidClassListEntry = function(O, V) {
                    if (V === "") throw new DOMException(
                        "Failed to execute '" + O + "' on 'DOMTokenList': The token provided must not be empty." );
                    if((wsIndex=V.search(wsRE))!==-1) throw new DOMException("Failed to execute '"+O+"' on 'DOMTokenList': " +
                        "The token provided ('"+V[wsIndex]+"') contains HTML space characters, which are not valid in tokens.");
                    }
                    // 2. Implement the barebones DOMTokenList livelyness polyfill
                    if (typeof DOMTokenList !== "function") (function(window){
                        var document = window.document, Object = window.Object, hasOwnProp = Object.prototype.hasOwnProperty;
                        var defineProperty = Object.defineProperty, allowTokenListConstruction = 0, skipPropChange = 0;
                        function DOMTokenList(){
                            if (!allowTokenListConstruction) throw TypeError("Illegal constructor"); // internally let it through
                        }
                        DOMTokenList.prototype.toString = DOMTokenList.prototype.toLocaleString = function(){return this.value};
                        DOMTokenList.prototype.add = function(){
                            a: for(var v=0, argLen=arguments.length,val="",ele=this[" uCL"],proto=ele[" uCLp"]; v!==argLen; ++v) {
                                val = arguments[v] + "", checkIfValidClassListEntry("add", val);
                                for (var i=0, Len=proto.length, resStr=val; i !== Len; ++i)
                                    if (this[i] === val) continue a; else resStr += " " + this[i];
                                this[Len] = val, proto.length += 1, proto.value = resStr;
                            }
                            skipPropChange = 1, ele.className = proto.value, skipPropChange = 0;
                        };
                        DOMTokenList.prototype.remove = function(){
                            for (var v=0, argLen=arguments.length,val="",ele=this[" uCL"],proto=ele[" uCLp"]; v !== argLen; ++v) {
                                val = arguments[v] + "", checkIfValidClassListEntry("remove", val);
                                for (var i=0, Len=proto.length, resStr="", is=0; i !== Len; ++i)
                                    if(is){ this[i-1]=this[i] }else{ if(this[i] !== val){ resStr+=this[i]+" "; }else{ is=1; } }
                                if (!is) continue;
                                delete this[Len], proto.length -= 1, proto.value = resStr;
                            }
                            skipPropChange = 1, ele.className = proto.value, skipPropChange = 0;
                        };
                        window.DOMTokenList = DOMTokenList;
                        function whenPropChanges(){
                            var evt = window.event, prop = evt.propertyName;
                            if ( !skipPropChange && (prop==="className" || (prop==="classList" && !defineProperty)) ) {
                                var target = evt.srcElement, protoObjProto = target[" uCLp"], strval = "" + target[prop];
                                var tokens=strval.trim().split(wsRE), resTokenList=target[prop==="classList"?" uCL":"classList"];
                                var oldLen = protoObjProto.length;
                                a: for(var cI = 0, cLen = protoObjProto.length = tokens.length, sub = 0; cI !== cLen; ++cI){
                                    for(var innerI=0; innerI!==cI; ++innerI) if(tokens[innerI]===tokens[cI]) {sub++; continue a;}
                                    resTokenList[cI-sub] = tokens[cI];
                                }
                                for (var i=cLen-sub; i < oldLen; ++i) delete resTokenList[i]; //remove trailing indexes
                                if(prop !== "classList") return;
                                skipPropChange = 1, target.classList = resTokenList, target.className = strval;
                                skipPropChange = 0, resTokenList.length = tokens.length - sub;
                            }
                        }
                        function polyfillClassList(ele){
                            if (!ele || !("innerHTML" in ele)) throw TypeError("Illegal invocation");
                            ele.detachEvent( "onpropertychange", whenPropChanges ); // prevent duplicate handler infinite loop
                            allowTokenListConstruction = 1;
                            try{ function protoObj(){} protoObj.prototype = new DOMTokenList(); }
                            finally { allowTokenListConstruction = 0 }
                            var protoObjProto = protoObj.prototype, resTokenList = new protoObj();
                            a: for(var toks=ele.className.trim().split(wsRE), cI=0, cLen=toks.length, sub=0; cI !== cLen; ++cI){
                                for (var innerI=0; innerI !== cI; ++innerI) if (toks[innerI] === toks[cI]) { sub++; continue a; }
                                this[cI-sub] = toks[cI];
                            }
                            protoObjProto.length = cLen-sub, protoObjProto.value = ele.className, protoObjProto[" uCL"] = ele;
                            if (defineProperty) { defineProperty(ele, "classList", { // IE8 & IE9 allow defineProperty on the DOM
                                enumerable:   1, get: function(){return resTokenList},
                                configurable: 0, set: function(newVal){
                                    skipPropChange = 1, ele.className = protoObjProto.value = (newVal += ""), skipPropChange = 0;
                                    var toks = newVal.trim().split(wsRE), oldLen = protoObjProto.length;
                                    a: for(var cI = 0, cLen = protoObjProto.length = toks.length, sub = 0; cI !== cLen; ++cI){
                                        for(var innerI=0; innerI!==cI; ++innerI) if(toks[innerI]===toks[cI]) {sub++; continue a;}
                                        resTokenList[cI-sub] = toks[cI];
                                    }
                                    for (var i=cLen-sub; i < oldLen; ++i) delete resTokenList[i]; //remove trailing indexes
                                }
                            }); defineProperty(ele, " uCLp", { // for accessing the hidden prototype
                                enumerable: 0, configurable: 0, writeable: 0, value: protoObj.prototype
                            }); defineProperty(protoObjProto, " uCL", {
                                enumerable: 0, configurable: 0, writeable: 0, value: ele
                            }); } else { ele.classList=resTokenList, ele[" uCL"]=resTokenList, ele[" uCLp"]=protoObj.prototype; }
                            ele.attachEvent( "onpropertychange", whenPropChanges );
                        }
                        try { // Much faster & cleaner version for IE8 & IE9:
                            // Should work in IE8 because Element.prototype instanceof Node is true according to the specs
                            window.Object.defineProperty(window.Element.prototype, "classList", {
                                enumerable: 1,   get: function(val){
                                                    if (!hasOwnProp.call(this, "classList")) polyfillClassList(this);
                                                    return this.classList;
                                                },
                                configurable: 0, set: function(val){this.className = val}
                            });
                        } catch(e) { // Less performant fallback for older browsers (IE 6-8):
                            window[" uCL"] = polyfillClassList;
                            // the below code ensures polyfillClassList is applied to all current and future elements in the doc.
                            document.documentElement.firstChild.appendChild(document.createElement('style')).styleSheet.cssText=(
                                '_*{x-uCLp:expression(!this.hasOwnProperty("classList")&&window[" uCL"](this))}' + //  IE6
                                '[class]{x-uCLp/**/:expression(!this.hasOwnProperty("classList")&&window[" uCL"](this))}' //IE7-8
                            );
                        }
                    })(window);
                    // 3. Patch in unsupported methods in DOMTokenList
                    (function(DOMTokenListProto, testClass){
                        if (!DOMTokenListProto.item) DOMTokenListProto.item = function(i){
                            function NullCheck(n) {return n===void 0 ? null : n} return NullCheck(this[i]);
                        };
                        if (!DOMTokenListProto.toggle || testClass.toggle("a",0)!==false) DOMTokenListProto.toggle=function(val){
                            if (arguments.length > 1) return (this[arguments[1] ? "add" : "remove"](val), !!arguments[1]);
                            var oldValue = this.value;
                            return (this.remove(oldValue), oldValue === this.value && (this.add(val), true) /*|| false*/);
                        };
                        if (!DOMTokenListProto.replace || typeof testClass.replace("a", "b") !== "boolean")
                            DOMTokenListProto.replace = function(oldToken, newToken){
                                checkIfValidClassListEntry("replace", oldToken), checkIfValidClassListEntry("replace", newToken);
                                var oldValue = this.value;
                                return (this.remove(oldToken), this.value !== oldValue && (this.add(newToken), true));
                            };
                        if (!DOMTokenListProto.contains) DOMTokenListProto.contains = function(value){
                            for (var i=0,Len=this.length; i !== Len; ++i) if (this[i] === value) return true;
                            return false;
                        };
                        if (!DOMTokenListProto.forEach) DOMTokenListProto.forEach = function(f){
                            if (arguments.length === 1) for (var i = 0, Len = this.length; i !== Len; ++i) f( this[i], i, this);
                            else for (var i=0,Len=this.length,tArg=arguments[1]; i !== Len; ++i) f.call(tArg, this[i], i, this);
                        };
                        if (!DOMTokenListProto.entries) DOMTokenListProto.entries = function(){
                            var nextIndex = 0, that = this;
                            return {next: function() {
                                return nextIndex<that.length ? {value: [nextIndex, that[nextIndex++]], done: false} : {done: true};
                            }};
                        };
                        if (!DOMTokenListProto.values) DOMTokenListProto.values = function(){
                            var nextIndex = 0, that = this;
                            return {next: function() {
                                return nextIndex<that.length ? {value: that[nextIndex++], done: false} : {done: true};
                            }};
                        };
                        if (!DOMTokenListProto.keys) DOMTokenListProto.keys = function(){
                            var nextIndex = 0, that = this;
                            return {next: function() {
                                return nextIndex<that.length ? {value: nextIndex++, done: false} : {done: true};
                            }};
                        };
                    })(window.DOMTokenList.prototype, window.document.createElement("div").classList);
                    })(window);

                    /* Do toggle action */
                    if(toggleMenu.classList.contains("collapse")) {
                        toggleMenu.classList.remove("collapse");
                    } else {
                        toggleMenu.classList.add("collapse");
                    }
                }

                /* Get current URL */
                let currentURL = window.location.href;
                /* Array with elements to show/hide */
                let showHideElements = ["g_06", "customer_it_person_contact_info", "CT-Scanner", "C-Arm", "X-Rays", "RetailCT-Scanner", "InventoryCT-Scanner", "WholesaleCT-Scanner"];

                function hideElements() {                   
                    /* Hide elements on array */
                    for (i = 0; i < showHideElements.length; i++) {
                        let elementIs = document.getElementById(showHideElements[i]);
                        elementIs.style.display = "none";
                    }
                }

                /* Add functionality to "Add New Job" form on create.blade.php */
                if (currentURL.indexOf("create") != -1 ) {
                    console.log("We are on create page");

                    // Calls hide elements function
                    hideElements();
                    // Selector elements array
                    let selector = ["modality-selector", "job-type-selector"];
                    // Go over selectors and get elements
                    for (i = 0; i < selector.length; i++) {
                        let selectorChanged = selector[i];
                        let selectedSelector = document.getElementById(selector[i]);

                        // Get value of selection on select elements. Show/hide those elements
                        function showHideAction() { 
                            let selectedValue = selectedSelector.options[selectedSelector.selectedIndex].value;
                            
                            for (i = 0; i < showHideElements.length; i++) {
                                
                                if (showHideElements[i] === selectedValue) {
                                    document.getElementById(showHideElements[i]).style.display = "block"; 
                                } 
                                else {
                                    document.getElementById(showHideElements[i]).style.display = "none";    
                                }
                            }
                        }
                        // When change is noticed on select elements, call identify values
                        selectedSelector.addEventListener("change", showHideAction);
                          
                    }

                    function showHideYesNo(value, element) {
                        let applyShowType = document.getElementById(element);
                        if (value === "Yes") {
                            applyShowType.style.display = "block"; 
                        }
                        else {
                            applyShowType.style.display = "none";
                        }
                    }   
                    
                    function showHideJobType(value, element) {
                        //console.log("Value is: " + value + "and the element" + element);
                        for (i = 0; i < element.length; i++) {
                            let valueSection = value + "CT-Scanner";
                            let applyShowType = document.getElementById(element[i]);
                        
                            if (valueSection === element[i]) {
                                //console.log("Show: " + element[i]);
                                applyShowType.style.display = "block"; 
                            }
                            else {
                                //console.log("Hide " + element[i]);
                                applyShowType.style.display = "none";
                            }
                        }
                    }
                
                /* Add functionality to "Update Job" form on update.blade.php */
                } if (currentURL.indexOf("jobs/") != -1) {
                    //console.log("We are on update page");

                    hideElements();

                    if ( "{{ $job ?? '' }}" != null ) {
                        let showModality = "{{ $job ?? ''->modality ?? '' }}" + "ProductionInfo";
                        let showJobType = "{{ $job ?? ''->job_type ?? '' }}" + "CT-Scanner";

                        let showElements = [showModality, showJobType];
                        //console.log(showElements);

                        for (i = 0; i < showElements.length; i++ ) {
                            let applyShowType = document.getElementById(showElements[i]);
                            applyShowType.style.display = "block";
                        }

                    } else {
                        //Do Nothing
                    }
                      
                } else {
                    /* Do nothing */
                }
            }
            /* End window on load  */
            
        </script>
   </body>
</html>