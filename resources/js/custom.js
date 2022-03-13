const { getJSON } = require("jquery");
const { toInteger, countBy } = require("lodash");

$('.edit-add input').on('keypress',function(ev){
    if(ev.key==='Enter')
    {
        let arr=[];
        if($('select[name=status]').val())
        {
            arr.push(
                {  name:$('select[name=status]').attr('name'),value:$('select[name=status]').val()}
            );            
        }
        for (let item of $('.edit-add input')) {
            if($(item).val()!=='')
                arr.push({
                    name:$(item).attr('name'), 
                    value:$(item).val()
                });
        }
        $.ajax(
            {
                type:'get',
                data:{'arr':arr},
                url:'/admin/products/setSession'
            }
        ).done(function(data){
            if(data.type==='success')
            {
                alert('Success');
                window.location.href='/admin/products/search';
            }    
        });
        console.log(arr);

    }
});
$('.edit-add select').on('change', function(){
    alert(this.value);
    let arr=[{  name:this.name,value:this.value}];
    for (let item of $('.edit-add input')) {
        if($(item).val()!=='')
            arr.push({
                name:$(item).attr('name'), 
                value:$(item).val()
            });
    }
    $.ajax({
            type:'get',
            data:{'arr':arr},
            url:'/admin/products/setSession'
        }).done(function(data){
        if(data.type==='success')
        {
            alert('Success');
            window.location.href='/admin/products/search';
        }    
    });
    console.log(arr);
});
$('.create-product input[type=file]').change(function(ev){
    var files=ev.target.files;

    let parent=$(ev.target).parent();
    $(parent).css('border','2px solid red');
    for (let file of files) {
        filesArr.items.add(file);
    }
    ev.target.files=filesArr.files;
    console.log(ev.target.files);
    for (let i=0;i<files.length;i++) {
        let url=window.URL.createObjectURL(files[i]);
        $('.create-product div.images img:last').attr('src',url);
        $('.create-product div.images').append('<img src/>');
        let image=document.querySelector('.create-product div.images img:last-child');
        observer.observe(image,{
            attributes:true,
            attributeOldValue: true,
        });
    }
    
});
function changeAttr(mutation)
{
    for (const item of mutation) {
        console.log(item.oldValue);
        window.URL.revokeObjectURL(item.oldValue);
    }
}
let observer=new MutationObserver(changeAttr);
let images=document.querySelectorAll('.create-product div.images img');
if(images)
{
    for (let item of images) {
        observer.observe(item,{
            attributes:true,
            attributeOldValue: true,
        });    
    }
    var filesArr=new DataTransfer();
}