<main>
  <h1>Webcam</h1>
  <div id="camera" class='main_container'>
	<div id="view">
		<div id="cam_container">
			<canvas id="filter_canvas"></canvas>
			<video id="video" style="display: inherit" poster="photos/icons/user.jpg"></video>
			<img id="video_img" alt="">
			<button id="startbutton">UPLOAD</button><br/>
			<div id="filters_container"></div>
		</div>
		<div id="upload_img">
			<label for="img_file">Upload an image  :</label>
			<input type="hidden" name="MAX_FILE_SIZE" value="4194304">
			<input id="img_file" type="file" name="img_file"></input>
			<button id="send_img">Upload</button>
			<p id="upload_msg" class="error_msg"></p>
			<a id="back2cam" href="javascript:reload_cam()" style="display: none">Switch to webcam</a>
		</div>
	</div>
	<div id="photos_container"></div>
  </div>
</main>
