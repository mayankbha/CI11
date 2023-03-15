tinyMCE.init({



        // General options



        mode : "textareas",



        theme : "advanced",



        plugins : "autolink,pagebreak,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",



		



        // Theme options



        theme_advanced_buttons1 : "save,newdocument,|,bold,underline,italic,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",



        theme_advanced_buttons2 : "search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",



        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,advhr,|,print,|,ltr,rtl,|,fullscreen",



        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",



        theme_advanced_toolbar_location : "top",



        theme_advanced_toolbar_align : "left",



        theme_advanced_statusbar_location : "bottom", 



        theme_advanced_resizing : true,



		file_browser_callback : "ajaxfilemanager", 



		editor_deselector : "mceNoEditor",



        // Skin options



        skin : "o2k7",



        skin_variant : "silver"







});



function ajaxfilemanager(field_name, url, type, win) {



           var ajaxfilemanagerurl = base_url+"js/tiny_mce_new/plugins/ajaxfilemanager/ajaxfilemanager.php";



		   var view = 'thumbnail';



           switch (type) {



                case "image":



                        break;



                case "media":



                        break;



                case "flash":



                        break;



                case "file":



                        break;



                default:



                        return false;



     }



     tinyMCE.activeEditor.windowManager.open({



         url: base_url+"js/tiny_mce_new/plugins/ajaxfilemanager/ajaxfilemanager.php?view="+view,



         width: 782,



         height: 440,



         inline : "yes",



         close_previous : "no"



     },{



         window : win,



         input : field_name



     });



   }
