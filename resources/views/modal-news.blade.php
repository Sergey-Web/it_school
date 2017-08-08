<!-- Modal Delete -->
<div class="modal-delete modal fade" id="modalDelete" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-delete__conent modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete news</h4>
            </div>
            <div class="modal-body">
                Do you really want to delete this news?
            </div>
            <form class="form-delete-news" method="POST" action="{{ route('delete-news') }}">
                {{ csrf_field() }}
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">Close</button>
                    <button type="submit" id="newsSendDel" name="newsDeleleId" value=""
                            class="modal-delete__btn-del btn btn-danger">
                                            <span class="modal-delete__icn-remove glyphicon
                                            glyphicon-remove"></span>Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit news</h4>
            </div>
            <form class="form-edit-news" method="POST" action="{{ route('edit-news') }}">
                {{ csrf_field() }}
                <input type="text" class="form-control form-edit-news__title" name="newsTitle" value="">
                <textarea class="form-control form-edit-news__content" name="newsContent" rows="5"
                          placeholder="Content"></textarea>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">Close</button>
                    <button type="submit" id="newsSendEdit" name="newsEditId" value="" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>