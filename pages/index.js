import Head from "next/head";

export default function Home() {
  return (
    <div className="container">
      <Head>
        <title>batuhan@icoz:~#</title>

        <meta
          name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
        />

        <link
          href="https://fonts.googleapis.com/css?family=Merriweather:400,700,400italic"
          rel="stylesheet"
          type="text/css"
        />
      </Head>

      <div className="container">
        <img
          src="/avatar-shitquality.jpg"
          className="profile-image"
          alt="Fırat Batuhan İçöz"
        />

        <h1>f. batuhan içöz</h1>
        <p>digital product maker, investor & software engineer</p>
        <h2>currently</h2>
        <ul>
          <li>
            co-founder + head of product at <a href="https://www.minipagehq.com/?ref=bt.hn">Minipage</a>
          </li>
          <li>
            small scale investments at <a href="https://pickled.works">pickled.works</a>
          </li>
        </ul>

        <h2>sometimes</h2>
        <ul>
          <li>
            freelance digital product + startup consultant at large
          </li>
          <li>
            political live streams (in Turkish) at <a href="https://twitch.tv/susbatuhan">twitch</a>
          </li>
        </ul>
  
        <h2>before</h2>
        <ul>
          <li>
            <strong>2020</strong> senior product engineer + proud first employee at{" "}
            <a href="https://www.checklyhq.com/?ref=bt.hn">a kick-ass active monitoring startup</a>
          </li>
          <li>
            <strong>2014-2019</strong> founder + cto at a software focused
            digital product studio
          </li>
          <li>
            <strong>2018-2019</strong> co-founder at an e-commerce fulfilment
            company
          </li>
          <li>
            <strong>2016-2019</strong> business owner at an impound lot & tow
            trucking services company
          </li>
          <li>
            <strong>2015-2017</strong> head of business development + co-founder
            at a startup factory
          </li>
          <li>
            <strong>2015</strong> co-founder + manager at a short lived video
            production studio
          </li>
          <li>
            <strong>2014</strong> head of software development at an award winning performance
            marketing agency
          </li>
          <li>
            <strong>2010-2014</strong> freelance software developer, senior full-stack web developer at various ad agencies
          </li>
          <li>
            <strong>2009-2012</strong> co-founder at a then super popular online broadcaster
          </li>
          <li>
            <strong>2009-2010</strong> lead developer at a startup
          </li>
          <li>
            <strong>2009-2010</strong> maximazing future cringe by vlogging
          </li>
          <li>
            <strong>2005-2009</strong> a period of shitty code and embarrassing forum posts
          </li>
          <li>
            <strong>2005</strong> first LOC
          </li>
          <li>
            <strong>1995</strong> boot
          </li>
        </ul>

        <p className="make-it-bold">
          <a href="mailto:batuhan@icoz.co">batuhan@icoz.co</a> |{" "}
          <a href="https://twitter.com/batuhan">Twitter</a> |{" "}
          <a href="https://instagram.com/batuhan">Instagram</a> |{" "}
          <a href="https://twitch.tv/susbatuhan">Twitch</a> |{" "}
          <a href="https://github.com/batuhan">GitHub</a> |{" "}
          <a href="https://linkedin.com/in/batuhanicoz">LinkedIn</a>
        </p>
      </div>

      <style jsx>{`
        .epilogue {
          font-size: 10px;
        }
        .lastupdated {
          font-size: 5px;
          margin-top: 5px;
        }
        #firstline {
          font-weight: 500;
          font-size: 28px;
          margin: 20px 0 15px;
          line-height: 32px;
        }
        p.text-content {
          margin-top: 10px;
          font-weight: 300;
          text-decoration: none;
        }
        header {
          margin: 30px;
          position: relative;
        }
        header a,
        .linkbuttons a,
        .linkbutton {
          background-color: #000;
          color: #fff;
          padding: 7px;
        }
        header a:hover,
        .linkbuttons a:hover,
        .linkbutton:hover {
          background-color: #666666;
          color: #fff !important;
        }

        .profile-image {
          width: 100px;
          border-radius: 50%;
          opacity: 0.7;
        }
        .profile-image:hover {
          opacity: 1;
        }
        hr {
          margin: 25px 0px 25px 0px;
          border: 0;
          height: 0;
          border-top: 1px solid rgba(0, 0, 0, 0.1);
          border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }
        .content-area-list {
          padding: 0;
        }
        .content-area-item {
          list-style: none;
          margin-bottom: 20px;
        }
        .content-area-item .title {
          font-weight: 500;
          font-size: 18px;
          display: block;
        }
        .content-area-item .subtitle {
          font-size: 16px;
          margin: 5px 0;
          display: block;
        }
        .content-area-item .time {
          font-weight: 300;
          font-style: normal;
          margin-top: 5px;
          display: block;
          font-size: 14px;
        }
        @media print {
          .no-print,
          .no-print * {
            display: none !important;
          }
        }
        @media screen and (max-width: 1087px) {
          .container {
            width: 94% !important;
          }
        }
        @media screen and (max-width: 1024px) {
          .container {
            width: 100% !important;
            margin: 0 auto !important;
            box-shadow: none;
            /* margin: 15vh auto 15vh 15vh; */
          }
        }

        .clearfix {
          display: block;
        }
        .clearfix:after {
          visibility: hidden;
          display: block;
          font-size: 0;
          content: " ";
          clear: both;
          height: 0;
        }
        .container {
          padding-right: 5%;
          padding-left:  5%;
          margin-right: 5%;
          padding-top: 5%;
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
