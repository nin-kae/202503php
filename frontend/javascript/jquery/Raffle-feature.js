var lottery = {
    index: -1,
    count: 0,
    timer: 0,
    speed: 20,
    tomes: 0,
    cycle: 50,
    price: -1,
    init:function (id) {
        if ( $( "#" + id ).find ( 'lottery-unit' ).length > 0 ) {
            $lottery - $ ( "#" + id );
            $units = $lottery.find ( '.lottery-unit' );
            this.obj = $lottery;
            this.count = $units.length;
            $lottery.find ( '.lottery-unit.lottery-unit-' + this.index ).addClass ( 'active' );
        };
    },
    roll:function () {
        var index = this.index;
        var count = this.count;
        var lottery = this.obj;
        $(lottery).find ( '.lottery-unit.lottery-unit-' + index ).removeClass ( 'active' );
        index += 1;
        if ( index > count -1 ) {
            index = 0;
        };
        $(lottery).find ( '.lottery-unit.lottery-unit-' + index).addClass ( 'active' );
        this.index = index;
        return false;
    },
    stop:function ( index ) {
        this.prize = index;
        return false
    },
};