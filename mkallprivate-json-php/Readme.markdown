OpenPhoto / Kitchensink / mkallprivate-json-php
=======================
#### Example JSON php script to iterate over photos via the openphoto API

----------------------------------------

This script assumes you've got your credentials in the environment variables referenced.

The script iterates over all your photos and sets the value of the "permission" parameter on each.

Uses /photos/pageSize-.../list.json   to get a list of all the photos.
Uses /photos/.../update.json   to modify the parameter on a given photo.

If you have a lot of photos you probably want to break up the loop more...

### About the files

The script relies on the same php libraries as the php command line script called "openphoto"
