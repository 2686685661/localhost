
@if(count($errors))
    <div id="" class="zhao" style="display: block;">
        <div class="ui-5447790657 npl-win npl-aau" style="top: 4.5px; left: 27%;">
            <div class="zwrp">
                <a href="javascript:;" class="zcls zflg" title="关闭" onclick="frontovers(this)"></a>
                <div class="ztbr noselect zmov">
                    <div class="zttl thide fc1 zflg">错误!!</div>
                </div>
                <div class="zcnt fc2 zflg">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif