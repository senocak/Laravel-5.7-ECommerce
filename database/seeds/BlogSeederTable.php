<?php
use App\Blog;
use Illuminate\Database\Seeder;

class BlogSeederTable extends Seeder{
    public function run(){
        for ($i = 1; $i <= 5; $i++) {
            Blog::create([
                'baslik' => 'Lorem Ipsum '.$i,
                'url' => 'lorem_ipsum_'.$i,
                'resim' => 'post'.$i.'.jpg',
                'icerik' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore! Testing content here  Welcome to WordPress. This is your first post. Edit or delete it, then start writing! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut nisl ultricies ex mollis congue. Mauris tempor justo nec lacus dignissim facilisis. Quisque in tortor justo. Pellentesque iaculis tempus venenatis. Etiam sit amet elit volutpat, egestas ipsum vel, aliquet',
            ]);
        }
    }
}
