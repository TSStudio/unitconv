# Unitconv 一个PHP单位转换器
## 如何使用？
#### 在你的文件中引用unitconv.php(使用include)
#### 执行以下语句
```php
<?php
include 'unitconv.php';
$yourobj=new unitconv();
```
基本使用方法为
`$yourobj->convert($value,$unit1,$unit2,$type);`
你当然可以不实例化而直接使用`::`来调用，但是不确定错误信息的获取
## 错误处理
如果在你执行了此方法后出现了错误，该方法会返回false并且你可通过
`$yourobj->errormsg;`
来查看错误原因
## 目前支持的单位
### length - 长度
#### m - 米
#### km - 千米
#### dm - 分米
#### cm - 厘米
#### mm - 毫米
#### um - 微米
#### nm - 纳米
#### ly - 光年
#### ld - 光天
#### in - 英寸
#### ft - 英尺
#### yd - 码
#### nmi - 海里
#### mi - 英里
#### 平方，立方请自行用1乘方处理

------------

### weight - 质量
#### g - 克
#### kg - 千克
#### mg - 毫克
#### ug - 微克
#### lb - 磅
#### oz - 盎司
#### ct - 克拉
#### t - 吨

------------

### time - 时间
#### s - 秒
#### min - 分
#### h - 时
#### d - 天
#### yr - 年
#### week - 星期
#### ms - 毫秒
#### us - 微妙
#### ns - 纳秒

------------

### data - 数据
#### B - 字节
#### b - 位
#### KB - 不解释 再往下都不解释
#### Kb
#### MB
#### Mb
#### GB
#### Gb

------------

### temp - 温度
#### C - 摄氏度
#### F - 华氏度
#### K - 开尔文

### 相信我，不同类型的单位转换绝对会出错的

------------

#### 发现bug或者请求增加单位可以直接发在issues页面

------------

### 在线演示
#### https://account.tmysam.top/test.php?t=[type]&v1=[value1]&u1=[unit1]&u2=[unit2]
#### 例如：将1米(m)转换为英里(mi)
#### https://account.tmysam.top/test.php?t=length&v1=1000&u1=m&u2=mi
