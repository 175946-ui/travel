  var imgsrc;
  var E = window.wangEditor;
  var editor = new E('#editor');
  editor.customConfig.uploadImgServer = 'uploads.php';
  editor.customConfig.uploadImgHooks = {
      fail:function (xhr, editor, result) {
          //上传错误时触发
          alert("上传图片失败");
      }
  };
  editor.customConfig.customUploadImg = function(files, insert) {
      var formData = new FormData();
      for(var i = 0;i < files.length;i ++) {
          formData.append("files[" + i + "]", files[i], files[i].name);
      }
      $.ajax({
        url: 'uploads.php',
        type: "POST",
        data: formData,
        dataType:'json',
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success:function(da){
          if(da.errno == 0){
            for(var j=0;j<da.data.length;j++){
                insert(da.data[j]);
            }
            imgsrc = getSrc(editor.txt.html()); //储存所有的图片，删除图片对比使用
          }else{
            alert(da.msg);
            return;
          }
        }
      });
  };

  // 将图片大小限制为 3M
  editor.customConfig.uploadImgMaxSize = 3 * 1024 * 1024;
  // 限制一次最多上传 5 张图片
  editor.customConfig.uploadImgMaxLength = 5;
  /**
   * 监控变化，同步更新到 content
   */
  editor.customConfig.onchange = function (html) {
    this.onchange(html);
  }.bind(this);
  
  editor.create();
  var editorHtml = document.getElementById('detail').innerHTML;
  imgsrc = getSrc(editorHtml); //储存所有的图片，删除图片对比使用
  editor.txt.html(editorHtml);
  document.getElementById('submit').addEventListener('click', function () {
    // 读取 html
    var editor_txt=editor.txt.html();
    if (!editor_txt || editor_txt=='<p><br></p>') {
      return false;
    }
    document.getElementById('content').value=editor_txt;
  }, false);


  /**
   * 文本域发生变化
   */
  function onchange (html) {
    // html 即变化之后的内容
    if (imgsrc.length !== 0) {
      let nowimgs = this.getSrc(html);
      let merge = imgsrc.concat(nowimgs).filter(function (v, i, arr) {
        return arr.indexOf(v) === arr.lastIndexOf(v)
      });
      for (let x in merge) {
        this.deleteImage(merge[x]); //服务器删除文件
      }
      imgsrc = nowimgs;
    }
  }

  /**
   * 取出区域内所有img的src
   */
  function getSrc (html) {
    var imgReg = /<img.*?(?:>|\/>)/gi;
    // 匹配src属性
    var srcReg = /src=[\\"]?([^\\"]*)[\\"]?/i;
    var arr = html.match(imgReg);
    let imgs = [];
    if (arr) {
      for (let i = 0; i < arr.length; i++) {
        var src = arr[i].match(srcReg)[1];
        imgs.push(src);
      }
    }
    return imgs;
  }

  /**
   * 删除服务器的图片
   */
   function deleteImage (img) {
    $.post('action.php?a=editordel', {'img':img}); //传入后台删除本地图片
  }