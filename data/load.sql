load data local infile "warehouse.dat"
into table Warehouse fields terminated by ",";

load data local infile "product.dat"
into table Product fields terminated by ",";

load data local infile "customer.dat"
into table Customer fields terminated by "<>";

load data local infile "storage.dat"
into table Storage fields terminated by ",";

load data local infile "sales.dat"
into table Sales fields terminated by ",";


