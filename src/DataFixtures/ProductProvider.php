<?php

namespace App\DataFixtures;


class ProductProvider {

    private $pumpkins = [
        [            
            'name' => 'Potimarron',   
            'type' => 'Courge',
            'resume' => 'Courge petite et ronde à la peau orange, rappelant la saveur de la châtaigne. Idéale pour des soupes, purées et desserts grâce à sa chair douce et sucrée.',
            'description' => 'Le potimarron possède une peau fine comestible et une chair orangée riche en vitamines A et C. Très polyvalent, il peut être cuisiné en soupe, purée, gratin ou encore en dessert. Sa texture crémeuse et son goût doux le rendent irrésistible. Idéal en soupe avec un peu de crème et des épices comme le curry. Peut également être rôti avec des herbes pour accompagner des plats d’automne.',
            'price' => 3.5,
            'picture' => 'https://locavor.fr/data/produits/2/46236/46236-potimarron-1.jpg',
        ],

        [            
            'name' => 'Butternut',   
            'type' => 'Courge',
            'resume' => 'Courge allongée beige, au goût subtil de noisette et légèrement sucrée. Parfaite pour des soupes, gratins, ou frites au four, et même en dessert.',
            'description' => 'La courge butternut est parfaite pour des préparations douces et veloutées. Riche en fibres et faible en calories, elle est un allié santé. Sa saveur douce s’intègre parfaitement dans des plats salés ou sucrés. En soupe, gratin, ou encore en frites au four avec un filet d’huile d’olive. Excellente en tarte sucrée !',
            'price' => 4,
            'picture' => 'https://rabbits.world/wp-content/uploads/2021/12/butternut.jpg',
        ],

        [            
            'name' => 'Jack O’Lantern',   
            'type' => 'Citrouille',
            'resume' => 'Citrouille orange emblématique d’Halloween, souvent utilisée pour la décoration.Comestible, elle convient aussi pour des purées, soupes ou tartes.',
            'description' => 'Avec sa forme ronde et sa couleur orange éclatante, cette citrouille est parfaite pour les sculptures décoratives. Sa chair est ferme et légèrement sucrée, idéale pour des recettes simples. Comme des potages ou des purées. Aussi idéale pour des tartes à la citrouille. ',
            'price' => 5,
            'picture' => 'https://www.verte-vallee.fr/assets/files/citrouille.jpeg',
        ],

        [            
            'name' => 'Courge Spaghetti',   
            'type' => 'Courge',
            'resume' => 'Courge allongée jaune dont la chair se transforme en filaments après cuisson. Alternative saine aux pâtes, parfaite avec des sauces variées.',
            'description' => ' La courge spaghetti est célèbre pour sa texture filandreuse qui rappelle les pâtes. Faible en calories et riche en nutriments, elle remplace parfaitement les spaghettis dans des plats sans gluten ou légers. Couper en deux, cuire au four, puis gratter avec une fourchette pour obtenir des "spaghettis". À déguster avec une sauce tomate ou un pesto. ',
            'price' => 3,
            'picture' => 'https://www.leshallesgourmandes.fr/wp-content/uploads/2022/09/courge-spaghetti.jpg',
        ],

        [            
            'name' => 'Musquée de Provence',   
            'type' => 'Courge',
            'resume' => 'Grande courge côtelée à la peau brune et à la chair dense et fondante. Idéale pour des veloutés, tartes sucrées ou rôtis, avec une saveur sucrée.',
            'description' => 'Cette courge, typique du sud de la France, possède une peau côtelée et une chair dense. Son goût sucré et sa texture fondante en font un ingrédient de choix pour les soupes, purées, ou tartes sucrées. En velouté ou en morceaux rôtis pour accompagner des viandes. Parfaite également pour des desserts comme la tarte à la citrouille.',
            'price' => 6,
            'picture' => 'https://www.distrimalo.com/media/courge_musquee_provence_site__009883800_1139_02112016.jpg'
        ],

        [            
            'name' => 'Patidou',   
            'type' => 'Courge',
            'resume' => 'Petite courge crème striée de vert, au goût sucré rappelant la noisette. Délicieuse rôtie, farcie ou utilisée comme élément décoratif.',
            'description' => 'Le patidou est apprécié pour sa chair tendre et sa saveur sucrée rappelant un peu la noisette ou la châtaigne. Parfait pour les préparations farcies ou en dessert.  Farcir avec un mélange de légumes, de céréales et de fromage, ou encore simplement rôti au four avec des épices douces.',
            'price' => 2.5,
            'picture' => 'https://www.amehasle.com/media/patidouvertsite__032689700_1139_02112016.jpg'
        ],

        [            
            'name' => 'Giraumon Turban',   
            'type' => 'Courge',
            'resume' => 'Courge colorée en forme de turban, prisée pour son esthétique unique. Comestible, elle est souvent farcie ou utilisée pour des plats festifs.',
            'description' => 'Le giraumon, avec sa forme de turban et ses couleurs vives, est souvent utilisé comme décoration. Sa chair douce et ferme se prête également bien aux soupes et gratins. Couper en morceaux pour des soupes ou gratins. Sa peau peut également servir de récipient comestible pour des plats farcis.',
            'price' => 5,
            'picture' => 'https://www.graines-de-style.fr/1819-large_default/potiron-giraumon-turban-turc.jpg'
        ],

        [            
            'name' => 'Kabocha',   
            'type' => 'Courge',
            'resume' => 'Courge asiatique à peau verte et chair orange, rappelant la patate douce. Utilisée en curry, soupe ou rôtie, avec une texture dense et sucrée.',
            'description' => ' Souvent appelée "potiron japonais", le kabocha est riche en saveurs et a une texture ferme rappelant la patate douce. Il est très populaire dans la cuisine asiatique. En soupe, sauté au wok, ou en curry japonais. Sa chair dense tient bien à la cuisson.',
            'price' => 3.5,
            'picture' => 'https://www.classicfinefoods-international.com/1154-large_default/courge-kabocha.jpg'
        ],

        [            
            'name' => 'Acorn',   
            'type' => 'Courge',
            'resume' => 'Petite courge verte en forme de gland, au goût doux et légèrement sucré. Idéale rôtie ou farcie, elle s’intègre bien aux plats d’automne.',
            'description' => 'De petite taille, cette courge est idéale pour être farcie. Sa chair est douce et sa saveur délicate. Parfaite pour des plats simples et rustiques. Cuire au four, farcie de légumes ou de viande. Se marie bien avec des épices comme la cannelle ou le cumin.',
            'price' => 3,
            'picture' => 'https://www.fermebastien.ca/img/Courges/VG6.jpg'
        ],

        [            
            'name' => 'Blue Hubbard',   
            'type' => 'Courge',
            'resume' => 'Courge bleutée à peau rugueuse et épaisse, de forme ovale et imposante. Sa chair sucrée et farineuse est parfaite pour des soupes, purées ou tartes automnales.',
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