@extends('queenCommon.template')

@section('connect')

    <div class="col-md-12">

        <!-- 自定义内容区域 -->

        <form action="" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="panel panel-default">
                <div class="panel-heading">
                    留言列表
                </div>
                <table class="table table-striped table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>
                            <label class="fancy-checkbox">
                                <input type="checkbox">
                                <span>全选</span>
                            </label>
                        </th>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>email</th>
                        <th>留言时间</th>
                        <th>修改时间</th>
                        <th>审核状态</th>
                        <th width="120">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <th>
                                <label class="checkbox">
                                    <input type="checkbox" name="ID[id]" value="1">1
                                </label>
                            </th>
                            <td scope="row">{{ $message->id }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ date('Y-m-d',$message->created_at) }}</td>
                            <td>{{ date('Y-m-d',$message->updated_at) }}</td>
                            <td>{{ $message->getadopt($message->adopt_id) }}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm">
                                    <a href="{{ url('message/noadopt',['id'=>$message->id]) }}">打回</a>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm">
                                    <a href="{{ url('message/delete',['id'=>$message->id]) }}"
                                       onclick="if (confirm('你确定要删除吗？？') == false) return false;"
                                    >删除</a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit Button</button>
                <button type="submit" class="btn btn-danger">Submit Button</button>
            </div>
        </form>

        <!-- 分页  -->
        <div>
            <div class="pull-right">
                {{ $messages->render() }}
            </div>
        </div>

    </div>



@stop