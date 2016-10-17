@extends('admin1')

@section('content')
    <div class="portlet light bordered">
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title" class="col-md-4 control-label">Название страницы</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control" name="Page[title]" value="{{ old('name') }}" required autofocus>

                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-md-4 control-label">Ссылка</label>

                <div class="col-md-6">
                    <input id="email" type="text" class="form-control" name="Page[link]" required>
                </div>
            </div>

            <div class="form-group">
                <label for="desc" class="col-md-4 control-label">Описание</label>

                <div class="col-md-6">
                    <input id="desc" type="text" class="form-control" name="Page[description]">
                </div>
            </div>

            <div class="form-group">
                <label for="css" class="col-md-4 control-label">Стиль CSS</label>

                <div class="col-md-6">
                    <input id="css" type="text" class="form-control" name="Page[css]">
                </div>
            </div>

            <div class="form-group">
                <label for="enabl" class="col-md-4 control-label">Описание</label>
                <div class="col-md-6">
                    <input id="enabl"type="checkbox" class="form-control" name="Page[enabled]">
                </div>
            </div>

            <div class="form-group">
                <label for="parent" class="col-md-4 control-label">Родитель</label>

                <div class="col-md-6">
                    <select id="parent" name="Page[parent_id]">
                        <option value="0">Нет родительской категории</option>
                        @foreach ($parentPage as $item)
                        <option value="{{$item['attributes']['m_id']}}">{{$item['attributes']['title']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Add Pages
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>
@stop