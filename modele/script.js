document.getElementById("defaultOpen").click();
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }

/**
 * Add tag in the other tag 
 * @param {HTMLElement} other the other tag
 * @param {string} type the type of new tag
 * @param {JSON} array dictionary of attributes of tag with key = name of attributes and value = the value of the attribute 
 * @param {Boolean} isAppend if append or prepend by default true
 * @returns the new tag created
 */
function addTagInOther(other,type,array,isAppend = true){
    var tag = createTag(type,array); //HTMLElement
    if(isAppend){
        other.appendChild(tag);
    }
    else{
        other.prepend(tag);
    }    
    return tag;
}
 /**
  * Create tag before put it in other one
  * @param {string} type the type of the tag 
  * @param {JSON} array dictionary of attributes of tag with key = name of attributes and value = the value of the attribute
  * @returns the new tag created
  */
  function createTag(type, array){
    var tag = document.createElement(type); //HTMLElement
    for (var key in array){
        tag.setAttribute(key, array[key]);
    }
    return tag; 
}