/*
Hướng dẫn thêm sản phẩm vào itemList

Một sản phẩm bao gồm 4 thành phần:

    "<mã sản phẩm>": {
        "name": "<tên sản phẩm>",
        "price": "<giá sản phẩm>",
        "photo": "<đường dẫn chỉ đến ảnh sản phẩm>"
    }


1. Mã sản phẩm:
    Một mã sản phẩm có định dạng như sau:

    "<tính chất><mã số>"

    Trong đó:
        Tính chất:
            men = sản phẩm cho nam
            lady = sản phẩm cho nữ
            hot = sản phẩm bán chạy
            new = sản phẩm mới
            (Lưu ý: Có thể kết hợp các tính chất nếu cần
            VD: 
                Sản phẩm vừa cho nam, vừa bán chạy "men-hot"
                Sản phẩm vừa cho nam, vừa cho nữ, vừa mới: "men-lady-new"
            )
        Mã số: là số tự nhiên bất kỳ
    
    *Lưu ý: không đặt mã sản phẩm trùng nhau.

2. Tên sản phẩm.

3. Giá sản phẩm:
    Là số tự nhiên viết liền không ngăn cách nhau bằng dấu cách chấm hoặc phẩy,...

4. Đường dẫn chỉ đến ảnh sản phẩm:
    Có thể là đường dẫn local hoặc đường dẫn ảnh bất kỳ copy trên internet
*/
var itemList={
    "newhot1":{ 
        "name":"Classic Bomber - Áo khoác Thu Đông",
        "price":1393000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2024/01/06/9b64b11a716005003ab1cdf6cbd1bf5a.jpg"
    },
    "new2":{ 
        "name":"Dapper Jeans - Quần Jeans Regular fit",
        "price":833000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2024/01/24/075baabaeb4ac4fc1747919a769e1abc.JPG"
    },
    "new3":{
        "name":"Urbane Jogger - Quần Slim bo gấu",
        "price":4409000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/400/2024/01/27/84c28e0f6aaf4e44ac0623cc90074091.jpg"
    },
    "newhot4":{
        "name":"Breathable Jacket - Áo khoác dạ'",
        "price":3669000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2024/01/06/cf4454eb122ff146a0f71b5ad16b5cb4.jpg"
    },
    "newhot5":{
        "name":"Tailor Trouser - Quần Tây Regular",
        "price":3519000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/400/2024/01/27/2a4487d0ec319dab6f7a818f98bec4ce.JPG"
    },
    "newhot6":{
        "name":"Summit Bomber - Áo khoác gió bomber",
        "price":4409000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/400/2024/01/06/162ee115a2f245d1a2c900431f988cfc.jpg"
    },
    "menhot7":{
        "name":"Quần tây cài khuy lệch",
        "price":5439000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/12/18/4f5a383bd1f3d48ef7c51753a68f84e5.JPG"
    },
    "men8":{
        "name":"Áo khoác gió có mũ",
        "price":4109000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/11/13/ce55ead3994f87c00a3e260a73d106ae.JPG"
    },
    "men9":{
        "name":"Áo len dệt nổi ziczac",
        "price":2649000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/12/17/3ca6adfcc809f129ec2fe008ad456ac3.jpg"
    },
    "new10":{
        "name":"Áo Supima Metagent basic",
        "price":4109000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/10/30/4a8bf694c5af30db725c735c5e8a0306.JPG"
    },
    "men11":{
        "name":"Áo khoác gió có mũ",
        "price":4109000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2024/01/06/8d7db3bfd1ee61f485b00489faff4dcf.jpg"
    },
    "lady12":{
        "name":"ÁO SƠ MI LỤA CỔ KIỂU",
        "price":4409000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/11/16/055ee2b6924333e8d2c5aa90c834e34d.JPG"
    },
    "new13":{
        "name":"Áo sơ mi kẻ Metagent",
        "price":5279000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2024/01/27/bd55450873fb6e5ec3ca574ee6c441ec.JPG"
    },
    "men14":{
        "name":"Urbane Jogger - Quần Slim bo gấu",
        "price":8219000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2024/01/06/7676ce02a8460ba08c45e33724e563e2.jpg"
    },
    "hotlady15":{
        "name":"ĐẦM ÔM TUYSI KÈM PHỤ KIỆN",
        "price":5589000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/12/21/25396fbb57e98514a070ead623064f0a.JPG"
    },
    "hotlady16":{
        "name":"ÁO SƠ MI LỤA CỔ KIỂU ĐÍNH KHUY",
        "price":1909000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/12/20/132426b4eaa44ee837b7ba26edcb8bff.JPG"
    },
    "men17":{
        "name":"Sweatshirt Escape",
        "price":5589000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/10/31/910f340f43d1ade178150a143e1bcf19.JPG"
    },
    "newhot19":{
        "name":"Cyrus Shirt - Sơ mi trơn lịch lãm",
        "price":5589000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/11/18/e0ca37e1af4cd7e12e87d8617970e98f.jpg"
    },
    "men20":{
        "name":'Oxford Jacket - Áo khoác nam cổ đức',
        "price":3239000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/08/31/fd84723da764a0ba057d9e0f1795984a.JPG"
    },
    "menhot21":{
        "name":'Áo thun trơn tay dài',
        "price":4409000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/09/25/1160f81fc58b2ff8e7b00cf83ba0b71b.jpg"
    },
    "lady22":{
        "name":'SET BỘ ÁO BLAZER SUÔNG VÀ QUẦN SHORT',
        "price":3829000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2024/01/03/11a43b91dc682940b90d569f516e4b64.jpg"
    },
    
    
    "lady23":{
        "name":'ÁO THUN TAY DÀI PHỐI KHUY',
        "price":5279000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2024/01/03/a4c9be76f353bafaf8a824b95dd4f5ff.jpg"
    },
    "new24":{
        "name":'Breathable Jacket - Áo khoác dạ',
        "price":3829000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/12/18/ea2c85ab361d5b3f720f299e96121ef2.JPG"
    },
    "menhot25":{
        "name":'Áo Supima Metagent basic',
        "price":3829000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/08/16/23b396c8362138798e1d852813f6b8db.JPG"
    },
    "hotlady26":{
        "name":'SET BỘ QUIETLUXURY',
        "price":4409000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/12/26/d289c5981ede71adf05cb3514762378b.jpg"
    },
    "new27":{
        "name":"Áo Bomber phối màu",
        "price":3959000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/11/18/b25d2ddc837b9c44ac84f871ac2dacc0.jpg"
    },
    "men28":{
        "name":"Áo sơ mi thêu logo Metagent",
        "price":3239000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/04/24/6c330a36e5dfa35b4c7d9d6e9da9e805.JPG"
    },
    "men29":{
        "name":"Quần tây dáng regular fit",
        "price":5129000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/02/16/62d4171a53f801c66a21cfd8e21ff424.jpg"
    },
    "new30":{
        "name":"Áo thun dài tay Regular",
        "price":2929000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/11/18/91aff81bb5bc60d4b9c032bd7e8a8e39.jpg"
    },
    "lady31":{
        "name":"JSET BỘ QUIETLUXURY",
        "price":4109000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/12/26/59830ba849710f078515db790da2361b.jpg"
    },
    "lady32":{
        "name":"ÁO THUN ÔM XẾP LY CHÉO",
        "price":4109000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/11/11/a71a98de315b35e075430e6a7dc2b468.jpg"
    },
    "lady33":{
        "name":"ĐẦM LỤA CỔ V THÂN XẾP",
        "price":4109000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/12/26/11bfaa886fcd2c116b144e1f2a04bf2f.jpg"
    },
    "lady34":{
        "name":"SƠ MI LỤA CỔ V KÈM NƠ EO",
        "price":2069000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/11/27/978cce790e1ce9c47bdf30bbd768b800.jpg"
    },
    "lady35":{
        "name":"ÁO KHOÁC TWILL DÁNG LỬNG",
        "price":3829000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2023/11/16/9ba71dd4f3e2debbb237357c7a3c2111.JPG"
    },
    "lady36":{
        "name":"QUẦN BAGGY GẬP GẤU",
        "price":4409000,
        "photo":"https://pubcdn.ivymoda.com/files/product/thumab/1400/2024/01/03/5dda59eec1f8fb75cd677762c55a58b8.jpg"
    }
};