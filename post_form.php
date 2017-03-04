<?php
/**
 * Created by PhpStorm.
 * User: vet
 * Date: 01.03.17
 * Time: 21:26
 */


function get_post_form ($post , $path , $action = 'new') {
    return '<form method="post" action="' . $path . '" class="form-horizontal col-md-6 col-md-offset-3">
            <h2>' . (($action == 'edit') ? 'Редактируем' : 'Добавить новый' ) .'</h2>
            <div class="form-group">
                <label for="input1" class="col-sm-2 control-label">Заголовок</label>
                <div class="col-sm-10">
                    <input value="' . ($post ? $post->title : null ) .'" type="text" name="title" class="form-control" id="input1" placeholder="Название заголовока"/>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Описание</label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control" id="description"
                              placeholder="Содержание...">' . ($post ? $post->description : null ) .'</textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-primary col-md-4 col-md-offset-8" value="' . (($action == 'new') ? 'SAVE' : 'Update' ) .'"/>
        </form>';
}
