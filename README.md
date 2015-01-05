gyg-ajax-controller
===================

Ajax request handling with gyg-framework



##Introduction
gyg-ajax-controller is a simple gyg-framework-controller that directs ajax requests using a whitelist. The whitelist is located in the directory of the controller making the ajax request and binds local file paths to keywords. This results in

* easy to use, secure and good-looking ajax request URLs.
* masking of local file paths.


##Installation
Installation is simple. However, it is assumed that the user knows [how to install controllers under gyg-framework](https://github.com/MickeMakaron/gyg-framework#controller-setup "controller installlation instructions"). 

1. Download repository.
2. Create a controller folder in the controllers directory. Name of the controller is up to the user.
3. Place contents in folder.
4. Whitelist controller.

###Whitelist
Performing an ajax request to a file requires a whitelist, also called _gygAjax configuration file_. This whitelist file must be located directly in the source controller's folder as follows:
    
    controllersDirectory/controller/gygAjax.php
    
Note that it must be named _gygAjax.php_. This configuration file must return an array of the following structure:

    $whitelist =
    [
        'keyword1' => 'localFilePath1',
        'keyword2' => 'localFilePath2',
        ...
    ];
    
The keys in the array are the keywords that will be used in the ajax request URLs. The values are the local file paths to the requested ajax file. Keywords must be unique to the same controller. However, two different controllers may have identical keywords with any issues.

####Example
The following is a code excerpt from [Playhouse](http://mikael.hernvall.com "Playhouse").

    // Located at controllers/playhouse/gygAjax.php
    return 
    [
        'splash' => __DIR__ . '/common/ajax/splash.php',
    	'post' => __DIR__ . '/pages/post/ajax.php',
    	'user' => __DIR__ . '/pages/user/ajax.php',
    	'project' => __DIR__ . '/pages/project/ajax.php',
    ];

Note that the file returns the array.

##Performing an ajax request
To perform an ajax request using gyg-ajax-controller, simply point to 

    /ajaxControllerName/controllerName/keyword
    
_ajaxControllerName_: Name of ajax controller given by user.

_sourceControllerName_: Name of the controller that holds the ajax file.

_keyword_: Keyword that identifies the ajax file. See whitelisting instructions above.

###Example
The following is a code excerpt from [Playhouse](http://mikael.hernvall.com "Playhouse"). It uses the whitelist presented under [the whitelist example section](DERP "whitelist example").

	$.ajax(
	{
		type: 'post',
		url: '/ajax/playhouse/splash',
		dataType: 'html',
		data: data,
		success: function(data){$('#headerSplash').html(data)},
	});

Note that the ajax controller is simply called _ajax_ and the controller containing the target file lies under the _playhouse_ controller.
