# php-protected-downloads
This example demonstrates how to protect a directory (and its contents) from direct access, and how to gate the access through a PHP script.
## Example Links
### Download via File System:
Downloading via File System will not work due to the .htaccess file preventing access to the contents of that directory.

`/no-access/example-file.pdf`
### Download via PHP Script:
Downloading via PHP Script will work since PHP works around the .htaccess directives. The download.php file does some basic sanitization and is limited to one level deep to prevent directory traversal attacks.

`/download.php?file=example-file.pdf`

...
