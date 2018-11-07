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
                'icerik' => $i . 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed velit velit, semper quis ullamcorper et, placerat quis quam. Aliquam condimentum lorem magna, sit amet iaculis enim porttitor ut. Vivamus commodo varius porttitor. Vivamus id fringilla metus. Donec ullamcorper facilisis justo, sed blandit magna auctor quis. Suspendisse placerat gravida vehicula. Mauris a scelerisque velit, eu commodo ex. Vestibulum urna ipsum, posuere et purus ut, luctus consectetur urna. Pellentesque risus nisl, mattis vel tincidunt sit amet, tempus sed dui. Nulla facilisi. Suspendisse potenti. Praesent nec ligula scelerisque, pretium libero at, consectetur lacus. Nunc tristique justo ac ipsum euismod, in euismod sapien hendrerit. Ut congue risus velit, quis fermentum eros pharetra a. Donec ultricies purus non turpis bibendum, a rutrum mauris mollis.

                Fusce dapibus, nisi at faucibus fermentum, dolor tellus ultricies nulla, non tristique diam justo sit amet tellus. Donec venenatis felis non eleifend iaculis. Vestibulum volutpat sagittis nibh ut faucibus. Nullam ultrices dui eget ullamcorper tempor. Quisque vitae ultricies ex. Sed id luctus lectus. Ut quis mauris vulputate, scelerisque est id, ullamcorper erat. Maecenas sit amet efficitur sapien. Sed feugiat at erat ac congue. In in eleifend elit. Nullam molestie convallis tincidunt. Praesent bibendum urna a augue vestibulum congue. Sed vitae urna vulputate, porta nunc ut, tempor metus. Duis ullamcorper nunc mi, quis iaculis tortor elementum eget. Phasellus quis felis vestibulum, ullamcorper magna vel, mattis eros. Sed posuere sem velit.
                
                Fusce laoreet pharetra felis, nec vestibulum augue ornare non. Sed cursus placerat ante et feugiat. Proin vulputate sapien id mattis sodales. Praesent id felis quis nibh maximus aliquam. Proin ut mi at magna condimentum tincidunt sagittis sit amet metus. Duis dapibus, est at vehicula feugiat, est orci malesuada leo, vitae suscipit ex diam vitae risus. Curabitur eu auctor nisi, et tincidunt arcu. Nulla commodo rutrum justo. Aenean orci nunc, dapibus egestas ligula nec, malesuada condimentum massa. Donec vel mauris finibus, feugiat ex sed, tristique elit.
                
                Praesent hendrerit cursus efficitur. Pellentesque pulvinar eu nunc sit amet faucibus. Duis rutrum lacinia enim tincidunt scelerisque. Aenean tincidunt enim id hendrerit rutrum. Vivamus eu mollis mauris. Suspendisse eu eros in ligula vulputate eleifend eu ac tortor. In hac habitasse platea dictumst. Aenean hendrerit commodo lectus, scelerisque volutpat risus luctus vel.
                
                Sed posuere urna risus, ac tempus arcu porttitor nec. Aenean volutpat elementum ante, quis fringilla orci pellentesque eget. Nam nisi ligula, faucibus ac placerat a, rutrum quis urna. Phasellus ex mauris, consequat vitae mi in, porta dapibus libero. Phasellus lectus erat, venenatis tincidunt fringilla eget, laoreet vel enim. Fusce nisi dui, maximus ac ultricies ac, tristique eleifend nunc. Nunc ut nunc consequat, fringilla mauris vitae, rhoncus lectus. Proin blandit feugiat lorem, ac lacinia diam. Aenean quis dolor eget neque gravida tempor. Quisque est est, viverra vitae augue quis, dignissim hendrerit ipsum. Nunc imperdiet, nisi sed lacinia ultrices, urna risus feugiat nunc, sed volutpat purus diam ac velit.',
            ]);
        }
    }
}
