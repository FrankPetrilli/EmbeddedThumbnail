What is it?
===========
A single PHP function which returns the base64 representation of the thumbnail of an image.

Why?
----
If you have a lot of images on your server-side, and want to show them in something like a gallery, you need thumbnails. It seems silly to me to keep duplicate copies of those images, so I generate them on-the-fly. Modern browsers allow you to express images as base64, so instead of serving them as an image, we serve them as base64 ready for inclusion in HTML and go. No mess, no storage required.

How do I use it?
----------------
Inside of a PHP page, you can use it in this format:

    <img src="<?= thumbnail("/path/to/jpeg.jpg", 100) ?>" alt="this will be sized to 100px wide, and the height is autocalculated.">

What are its parameters?
------------------------
The first parameter is the server-side path to an image. The second is the width of the thumbnail. If not set, this will be automatically set to 100.

The height is automatically calculated to maintain the aspect ratio of the original image dependent on the width.
