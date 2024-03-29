(function(){

    var h=window.AmCharts;h.AmPieChart=h.Class({inherits:h.AmSlicedChart,

    construct:function(d){

        this.type="pie";
        h.AmPieChart.base.construct.call(this,d);
        this.cname="AmPieChart";
        this.pieBrightnessStep=30;
        this.minRadius=10;
        this.depth3D=0;this.startAngle=90;
        this.angle=this.innerRadius=0;
        this.startRadius="500%";
        this.pullOutRadius="5%";
        this.labelRadius=20;
        this.labelText="[[title]]: [[percents]]%";
        this.balloonText=" This loan type the [[title]] got the percentage [[percents]]% with ([[value]]) borrower(s) availed. \n[[description]]";
        this.previousScale=1;
        this.adjustPrecision=!1;h.applyTheme(this,d,this.cname)},


        drawChart:function(){
            h.AmPieChart.base.drawChart.call(this);
            var d=this.chartData;
            if(h.ifArray(d)){if(0<this.realWidth&&0<this.realHeight){h.VML&&(this.startAlpha=1);

            var f=this.startDuration,c=this.container,b=this.updateWidth();
            this.realWidth=b;

            var m=this.updateHeight();
            this.realHeight=m;
            var e=h.toCoordinate,k=e(this.marginLeft,b),a=e(this.marginRight,b),v=e(this.marginTop,m)+this.getTitleHeight(),n=e(this.marginBottom,m),y,z,g,x=h.toNumber(this.labelRadius),q=
this.measureMaxLabel();
q>this.maxLabelWidth&&(q=this.maxLabelWidth);
this.labelText&&this.labelsEnabled||(x=q=0);
y=void 0===this.pieX?(b-k-a)/2+k:e(this.pieX,this.realWidth);
z=void 0===this.pieY?(m-v-n)/2+v:e(this.pieY,m);
g=e(this.radius,b,m);
g||(b=0<=x?b-k-a-2*q:b-k-a,m=m-v-n,g=Math.min(b,m),m<b&&(g/=1-this.angle/90,g>b&&(g=b)),m=h.toCoordinate(this.pullOutRadius,g),g=(0<=x?g-1.8*(x+m):g-1.8*m)/2);g<this.minRadius&&(g=this.minRadius);m=e(this.pullOutRadius,g);v=h.toCoordinate(this.startRadius,g);
e=e(this.innerRadius,g);e>=g&&(e=g-1);n=h.fitToBounds(this.startAngle,0,360);0<this.depth3D&&(n=270<=n?270:90);n-=90;b=g-g*this.angle/90;for(k=q=0;k<d.length;k++)a=d[k],!0!==a.hidden&&(q+=h.roundTo(a.percents,this.pf.precision));q=h.roundTo(q,this.pf.precision);this.tempPrec=NaN;this.adjustPrecision&&100!=q&&(this.tempPrec=this.pf.precision+1);for(k=0;k<d.length;k++)if(a=d[k],!0!==a.hidden&&0<a.percents){var r=360*a.percents/100,q=Math.sin((n+r/2)/180*Math.PI),A=-Math.cos((n+r/2)/180*Math.PI)*(b/
g),p=this.outlineColor;p||(p=a.color);var B=this.alpha;isNaN(a.alpha)||(B=a.alpha);p={fill:a.color,stroke:p,"stroke-width":this.outlineThickness,"stroke-opacity":this.outlineAlpha,"fill-opacity":B};a.url&&(p.cursor="pointer");p=h.wedge(c,y,z,n,r,g,b,e,this.depth3D,p,this.gradientRatio,a.pattern);h.setCN(this,p,"pie-item");h.setCN(this,p.wedge,"pie-slice");h.setCN(this,p,a.className,!0);this.addEventListeners(p,a);a.startAngle=n;d[k].wedge=p;0<f&&(this.chartCreated||p.setAttr("opacity",this.startAlpha));
a.ix=q;a.iy=A;a.wedge=p;a.index=k;if(this.labelsEnabled&&this.labelText&&a.percents>=this.hideLabelsPercent){var l=n+r/2;360<l&&(l-=360);var t=x;isNaN(a.labelRadius)||(t=a.labelRadius);var r=y+q*(g+t),B=z+A*(g+t),C,w=0;if(0<=t){var D;90>=l&&0<=l?(D=0,C="start",w=8):90<=l&&180>l?(D=1,C="start",w=8):180<=l&&270>l?(D=2,C="end",w=-8):270<=l&&360>l&&(D=3,C="end",w=-8);a.labelQuarter=D}else C="middle";var l=this.formatString(this.labelText,a),u=this.labelFunction;u&&(l=u(a,l));u=a.labelColor;u||(u=this.color);
""!==l&&(l=h.wrappedText(c,l,u,this.fontFamily,this.fontSize,C,!1,this.maxLabelWidth),h.setCN(this,l,"pie-label"),h.setCN(this,l,a.className,!0),l.translate(r+1.5*w,B),l.node.style.pointerEvents="none",a.tx=r+1.5*w,a.ty=B,0<=t?(t=l.getBBox(),u=h.rect(c,t.width+5,t.height+5,"#FFFFFF",.005),u.translate(r+1.5*w+t.x,B+t.y),a.hitRect=u,p.push(l),p.push(u)):this.freeLabelsSet.push(l),a.label=l);a.tx=r;a.tx2=r+w;a.tx0=y+q*g;a.ty0=z+A*g}r=e+(g-e)/2;a.pulled&&(r+=this.pullOutRadiusReal);a.balloonX=q*r+y;a.balloonY=
A*r+z;a.startX=Math.round(q*v);a.startY=Math.round(A*v);a.pullX=Math.round(q*m);a.pullY=Math.round(A*m);this.graphsSet.push(p);(0===a.alpha||0<f&&!this.chartCreated)&&p.hide();n+=360*a.percents/100}0<x&&!this.labelRadiusField&&this.arrangeLabels();this.pieXReal=y;this.pieYReal=z;this.radiusReal=g;this.innerRadiusReal=e;0<x&&this.drawTicks();this.initialStart();this.setDepths()}(d=this.legend)&&d.invalidateSize()}else this.cleanChart();this.dispDUpd();this.chartCreated=!0},setDepths:function(){var d=
this.chartData,f;for(f=0;f<d.length;f++){var c=d[f],b=c.wedge,c=c.startAngle;0<=c&&180>c?b.toFront():180<=c&&b.toBack()}},arrangeLabels:function(){var d=this.chartData,f=d.length,c,b;for(b=f-1;0<=b;b--)c=d[b],0!==c.labelQuarter||c.hidden||this.checkOverlapping(b,c,0,!0,0);for(b=0;b<f;b++)c=d[b],1!=c.labelQuarter||c.hidden||this.checkOverlapping(b,c,1,!1,0);for(b=f-1;0<=b;b--)c=d[b],2!=c.labelQuarter||c.hidden||this.checkOverlapping(b,c,2,!0,0);for(b=0;b<f;b++)c=d[b],3!=c.labelQuarter||c.hidden||this.checkOverlapping(b,
c,3,!1,0)},checkOverlapping:function(d,f,c,b,h){var e,k,a=this.chartData,v=a.length,n=f.label;if(n){if(!0===b)for(k=d+1;k<v;k++)a[k].labelQuarter==c&&(e=this.checkOverlappingReal(f,a[k],c))&&(k=v);else for(k=d-1;0<=k;k--)a[k].labelQuarter==c&&(e=this.checkOverlappingReal(f,a[k],c))&&(k=0);!0===e&&100>h&&(e=f.ty+3*f.iy,f.ty=e,n.translate(f.tx2,e),f.hitRect&&(n=n.getBBox(),f.hitRect.translate(f.tx2+n.x,e+n.y)),this.checkOverlapping(d,f,c,b,h+1))}},checkOverlappingReal:function(d,f,c){var b=!1,m=d.label,
e=f.label;d.labelQuarter!=c||d.hidden||f.hidden||!e||(m=m.getBBox(),c={},c.width=m.width,c.height=m.height,c.y=d.ty,c.x=d.tx,d=e.getBBox(),e={},e.width=d.width,e.height=d.height,e.y=f.ty,e.x=f.tx,h.hitTest(c,e)&&(b=!0));return b}})})();