<div>
    <form action="/FileUpload"
          method="post"
          enctype="multipart/form-data"
          id="image-upload"
          class="dropzone">
        @csrf
        <div>
            <h3>Upload Multiple Image By Click On Box</h3>
        </div>
    </form>

    <script type="text/javascript">

        // the below is needed for the above form '/FileUpload' which
        // uses dropzone...
        document.addEventListener('DOMContentLoaded', (event) => {
            Dropzone.options.imageUpload = {
                maxFilesize: 10,          // max size is 10mg
                acceptedFiles: ".svg",    // only accept .svg for now
                parallelUploads: 1,       // only download one file at a time
                renameFile: function (file) {
                    // console.log(file);
                    return file.name;
                },

                // once all the cards are downloaded emit the
                // 'riches-card-display' event...
                // this event is picked up by the RichesCardDisplay.php
                // Livewire server component.
                queuecomplete: function () {
                    // Livewire.emit('riches-card-display');
                    setTimeout(function() {
                        Livewire.emit('dz-card-file-upload');
                    }, 500);
                }
            };
        });
    </script>
</div>
