<div class="clearboth">
    <?php
    foreach ($this->data as $value){
        echo "<div class='myPhoto'>
                    <a class='img' href='__PHOTOROOT__{$value['name']}'><img src='__PHOTOROOT__{$value['name']}' alt='加载失败'></a>
              </div>";

    }
    ?>
</div>
