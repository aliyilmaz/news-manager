# ads-manager

Bu proje ads-manager projesinin bir yansısıdır. Bu döküman ise projeye katılacak çalışma arkadaşlarımızın aşağıdaki yönerge ışığında projeyi kurması, geliştirmesi, yedeklemesi ve yansıyı yönetmesine ilişkin bilgileri içerir.

## 1. Edinme

Projeyi edinmek için aşağıdaki komutu terminal'den çalıştırın, böylelikle proje varlıklarının bilgisayarınıza inmesi mümkün olacaktır.

```bash
git clone https://github.com/aliyilmaz/ads-manager.git
```

## 2. Ayarlar
Aşağıda belirtilen ayarlar yapılarak proje, kuruluma hazır hale getirilir.
### 2.1 İzinler

Eğer Apple Macinizde veya bir Linux dağıtımında çalışıyorsanız, aşağıdaki komut yardımıyla proje dizinine yazma izni uygulamanız gerekmektedir.

```bash
sudo chmod -R 777 ads-manager
```

**Bilgi:**
Bu komut, sunucu yazılımı türüne göre otomatik oluşturulan .htaccess dosyasının oluşturulmasına yetki verir, aynı zamanda proje kısımlarında bulunan dosya yükleme ve silme işlemlerinin gerçekleşmesine olanak tanır.

### 2.2 Veritabanı

Proje içeriklerinin tutulacağı veritabanı türü varsayılan olarak mysql olup, sqlite ve sqlsrv veritabanları da tercih edilebilir. Veritabanı adı varsayılan olarak ads'dir. Kurulum adımına geçilmeden önce bu isimde veritabanının daha önce oluşturulmadığına emin olunması gerekmektedir.

### 2.3 Güvenlik

Eğer başka kullanıcıların projeye erişmesini istemiyorsanız, ip adresiniz, işletim sisteminiz ve tarayıcı adınız gibi bilgilerle projenin sadece sizin erişiminize açık olmasını sağlayabilirsiniz.

Bu konu hakkında detaylı bilgi için Mind Framework dökümanındaki [ilgili](https://github.com/aliyilmaz/Mind/blob/master/docs/tr-readme.md#firewall) maddeyi okuyabilirsiniz.


## 3. Kurulum
Yerel sunucunuzda bıraktığınız yolu adres satırından bir defalığına yazıp çalıştırmanız halinde proje kurulumu gerçekleşecektir.
