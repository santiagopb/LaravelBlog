tinymce.init({ selector:'textarea', menubar:false , plugins: "link image code textcolor colorpicker preview",
toolbar: "image | styleselect | bold italic | forecolor backcolor | link | alignjustify alignleft aligncenter alignright | bullist numlist | outdent indent | preview | code",
relative_urls: false,
remove_script_host: false,
image_dimensions: true,
image_list: [
  @foreach($medias as $media)
  {title: "{{ $media->title }}", value: "{{ $uri . 'uploads/media/'. $media->media }}"},
  @endforeach
],
style_formats: [
{title: 'Image Left', selector: 'img', styles: {
  'float' : 'left',
  'margin': '0 10px 0 10px'
}},
{title: 'Image Right', selector: 'img', styles: {
  'float' : 'right',
  'margin': '0 10px 0 10px'
}}
],
link_list: [
  @foreach($posts as $postToLink)
  {title: "{{ $postToLink->title }}", value: "{{ $uri . ($postToLink->type=='post' ? 'blog/' : '') . $postToLink->slug }}"},
  @endforeach
]
});
