<?php

namespace App\DataFixtures;


class ProductProvider {

    private $pumpkins = [
        [            
            'name' => 'Potimarron',   
            'type' => 'Courge',
            'resume' => 'Petite courge en forme de poire avec une saveur légèrement sucrée rappelant la châtaigne.',
            'description' => 'Le potimarron possède une peau fine comestible et une chair orangée riche en vitamines A et C. Très polyvalent, il peut être cuisiné en soupe, purée, gratin ou encore en dessert. Sa texture crémeuse et son goût doux le rendent irrésistible. Idéal en soupe avec un peu de crème et des épices comme le curry. Peut également être rôti avec des herbes pour accompagner des plats d’automne.',
            'price' => 3.5,
            'picture' => 'https://locavor.fr/data/produits/2/46236/46236-potimarron-1.jpg',
        ],

        [            
            'name' => 'Butternut',   
            'type' => 'Courge',
            'resume' => 'Courge allongée à la peau beige et chair sucrée rappelant la noisette.',
            'description' => 'La courge butternut est parfaite pour des préparations douces et veloutées. Riche en fibres et faible en calories, elle est un allié santé. Sa saveur douce s’intègre parfaitement dans des plats salés ou sucrés. En soupe, gratin, ou encore en frites au four avec un filet d’huile d’olive. Excellente en tarte sucrée !',
            'price' => 4,
            'picture' => 'https://rabbits.world/wp-content/uploads/2021/12/butternut.jpg',
        ],

        [            
            'name' => 'Jack O’Lantern',   
            'type' => 'Citrouille',
            'resume' => 'La citrouille classique d’Halloween, idéale pour les décorations et les plats mijotés.',
            'description' => 'Avec sa forme ronde et sa couleur orange éclatante, cette citrouille est parfaite pour les sculptures décoratives. Sa chair est ferme et légèrement sucrée, idéale pour des recettes simples. Comme des potages ou des purées. Aussi idéale pour des tartes à la citrouille. ',
            'price' => 5,
            'picture' => 'https://www.verte-vallee.fr/assets/files/citrouille.jpeg',
        ],

        [            
            'name' => 'Courge Spaghetti',   
            'type' => 'Courge',
            'resume' => 'Courge unique dont la chair se transforme en filaments après cuisson.',
            'description' => ' La courge spaghetti est célèbre pour sa texture filandreuse qui rappelle les pâtes. Faible en calories et riche en nutriments, elle remplace parfaitement les spaghettis dans des plats sans gluten ou légers. Couper en deux, cuire au four, puis gratter avec une fourchette pour obtenir des "spaghettis". À déguster avec une sauce tomate ou un pesto. ',
            'price' => 3,
            'picture' => 'https://www.leshallesgourmandes.fr/wp-content/uploads/2022/09/courge-spaghetti.jpg',
        ],

        [            
            'name' => 'Musquée de Provence',   
            'type' => 'Courge',
            'resume' => 'Courge massive à chair douce et légèrement sucrée.',
            'description' => 'Cette courge, typique du sud de la France, possède une peau côtelée et une chair dense. Son goût sucré et sa texture fondante en font un ingrédient de choix pour les soupes, purées, ou tartes sucrées. En velouté ou en morceaux rôtis pour accompagner des viandes. Parfaite également pour des desserts comme la tarte à la citrouille.',
            'price' => 6,
            'picture' => 'https://www.distrimalo.com/media/courge_musquee_provence_site__009883800_1139_02112016.jpg'
        ],

        [            
            'name' => 'Patidou',   
            'type' => 'Courge',
            'resume' => 'Petite courge rayée vert et crème, au goût doux et légèrement sucré.',
            'description' => 'Le patidou est apprécié pour sa chair tendre et sa saveur sucrée rappelant un peu la noisette ou la châtaigne. Parfait pour les préparations farcies ou en dessert.  Farcir avec un mélange de légumes, de céréales et de fromage, ou encore simplement rôti au four avec des épices douces.',
            'price' => 2.5,
            'picture' => 'https://www.amehasle.com/media/patidouvertsite__032689700_1139_02112016.jpg'
        ],

        [            
            'name' => 'Giraumon Turban',   
            'type' => 'Courge',
            'resume' => 'Courge décorative et comestible au goût doux.',
            'description' => 'Le giraumon, avec sa forme de turban et ses couleurs vives, est souvent utilisé comme décoration. Sa chair douce et ferme se prête également bien aux soupes et gratins. Couper en morceaux pour des soupes ou gratins. Sa peau peut également servir de récipient comestible pour des plats farcis.',
            'price' => 5,
            'picture' => 'https://www.graines-de-style.fr/1819-large_default/potiron-giraumon-turban-turc.jpg'
        ],

        [            
            'name' => 'Acorn',   
            'type' => 'Courge',
            'resume' => 'Courge en forme de gland, à chair douce et légèrement sucrée.',
            'description' => 'De petite taille, cette courge est idéale pour être farcie. Sa chair est douce et sa saveur délicate. Parfaite pour des plats simples et rustiques. Cuire au four, farcie de légumes ou de viande. Se marie bien avec des épices comme la cannelle ou le cumin.',
            'price' => 3,
            'picture' => 'https://www.fermebastien.ca/img/Courges/VG6.jpg'
        ],

        [            
            'name' => 'Blue Hubbard',   
            'type' => 'Courge',
            'resume' => 'Grande courge à peau bleue et chair orange douce.',
            'description' => 'Cette variété impressionne par sa taille et sa couleur atypique. Elle a une chair sucrée, parfaite pour les desserts ou les purées. Son goût rappelle celui du potiron. En soupe, tarte, ou purée. Idéal pour des desserts automnaux grâce à sa douceur naturelle.',
            'price' => 7,
            'picture' => 'https://static.pourdebon.com/images/1200-630/pourdebon-image-bucket-prod/2b7f1b0175136f921c3946ead4144f9f.jpeg',
        ],
    ];



    /**
     * Get the value of pumpkins
     */
    public function getPumpkins()
    {
        return $this->pumpkins;
    }
}


?>