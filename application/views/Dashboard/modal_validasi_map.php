<div class="modal fade" id="modalValidasiMap" tabindex="-1" role="dialog" aria-labelledby="modalValidasiMapLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalValidasiMapLabel">Validasi Alamat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">Silahkan tentukan alamat Anda</p>
                <div class="mx-auto">
                    <div id="map" class="map_validasi"></div>
                    <form action="" method="post" class="mt-3">
                        <input type="text" id="lat" name="lat" value="">
                        <input type="text" id="lng" name="lng" value="">
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary noRadius" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary noRadius">Save changes</button>
            </div>
        </div>
    </div>
</div>