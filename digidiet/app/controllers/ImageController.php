<?php
	class ImageController extends BaseController {
		public function getImage($filename) {
			// Append the filename to the path where our images are located
		$path = Config::get('assets.images') . $filename;

		// Initialize an instance of Symfony's File class.
		// This is a dependency of Laravel so it is readily available.
		$file = new Symfony\Component\HttpFoundation\File\File($path);

		// Make a new response out of the contents of the file
		// Set the response status code to 200 OK
		$response = Response::make(
			File::get($path), 
			200
		);

		// Modify our output's header.
		// Set the content type to the mime of the file.
		// In the case of a .jpeg this would be image/jpeg
		$response->header(
			'Content-type',
			$file->getMimeType()
		);

		// We return our image here.
		return $response;
	}
}