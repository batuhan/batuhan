import Head from "next/head";

export default function Home() {
  return (
    <div className="container">
      <Head>
        <title>batuhan@icoz:~# Instagram kullanici adi</title>

        <meta
          name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
        />
      </Head>

      <div className="container">
      <p><i>bana kullanıcı adlarım ile ilgili yazanlara, paylaşımlarıma yorum bırakanlara bu sayfanın linki paylaşıyorum. başka bir şekilde kendinizi burada bulduysanız üzgünüm :)</i></p>

        <h1>merhaba.</h1>
        <p>yıllardır gün aşırı Instagram ve Twitter kullanıcı adım için mesaj ve teklifler alıyorum.</p>
        <p>bazıları kibarca yaklaşıyor, bazıları ben kibarca cevap versem dahi reddedildiğinde küfretmeye başlıyor.</p>
        <p>çeşitli saçmalıklarla 2016'dan beri üç kez kullanıcı adımı geri almam gerekti. hepsinde hesap da gittiği için tüm paylaşımlarımı, yılların anılarını da kaybetmiş oldum.</p>
        <p>bu kullanıcı adlarının bende olma sebebi ilk kayıt olanlardan olmam. satmayı veya devretmeyi istemiyorum ve düşünmüyorum. </p>

          <p><i>sosyal ağlarda bu tip kullanıcı adlarını yakalayabilmenin sırrı <a href="https://news.ycombinator.com">Hacker News</a>, <a href="https://www.producthunt.com/">Product Hunt</a>, <a href="https://reddit.com">reddit</a> gibi platformlarda aktif olmak, yeni açılan girişimleri hızlıca görmek ve kayıt olmak.</i></p>

  <p>bana ulaşmak istiyorsanız <a href="mailto:batuhan@icoz.co">batuhan@icoz.co</a> adresine e-posta gönderebilirsiniz.</p>
  <p><b>ÖNEMLİ: tehdit, hakaret içeren mesajların ve yorumların ekran görüntüleri ve hesap bilgileri ile avukatıma yönlendiriyorum ve asla cevaplamıyorum. bu gönderileri aynı zamanda bu sayfadan yayınlayacağım.</b></p>
      </div>

      <style jsx>{`
        @media screen and (max-width: 1024px) {
          .container {
            width: 100% !important;
            margin: 0 auto !important;
            box-shadow: none;
            /* margin: 15vh auto 15vh 15vh; */
          }
        }
        .container {
          padding-left: 1%;
          width: 750px;
        }
        .container:before,
        .container:after {
          display: table;
          content: " ";
        }
        .container:after {
          clear: both;
        }
      `}</style>

      <style jsx global>{`
        body,
        * {
          color: #000;
          background-color: #fff;

          font-family: Merriweather, Georgia, serif;
          -webkit-font-smoothing: antialiased;
          box-sizing: border-box;
        }
        h1,
        h2 {
          font-weight: 600;
        }

        a {
          font-weight: 700;
        }
        a:hover {
          text-decoration: none;
        }
        #footer {
          margin-top: 2%;
        }

        h2 {
          font-weight: bold;
        }
        p {
          line-height: 22px;
          /* margin-bottom: auto; */
          width: 100%;
        }
        li {
          width: 100%;
          margin: 0 auto;
        }
      `}</style>
    </div>
  );
}
