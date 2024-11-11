import Image from 'next/image';
import '../styles/HomePage.css';
import Link from 'next/link';
import user_icon from '@/resource/images/person.png';
function Home() { 
    return (
         <body className="bg-gray-100">
  <header className="bg-white shadow">
   <div className="container mx-auto px-6 py-3 flex justify-between items-center">
    <a className="text-xl font-bold text-gray-800" href="#">
      WebToon
    </a>
    <nav className="flex space-x-4">
     <a className="text-gray-800 hover:text-gray-600" href="#">
      Home
     </a>
     <a className="text-gray-800 hover:text-gray-600" href="#">
      Popular
     </a>
     <a className="text-gray-800 hover:text-gray-600" href="#">
      New Releases
     </a>
     <a className="text-gray-800 hover:text-gray-600" href="#">
      Contact
      </a>
      <Link href="#"><Image src={user_icon} alt="user"></Image></Link> 
     </nav>
   </div>
  </header>
  <main className="container mx-auto px-6 py-8">
   <section className="mb-8">
    <h2 className="text-2xl font-bold text-gray-800 mb-4">
     Featured Novels
    </h2>
    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
     <div className="bg-white shadow-md rounded-lg overflow-hidden">
      <Image alt="Cover image of a fantasy novel with a dragon and a knight" className="w-full h-48 object-cover" height="400" src="https://storage.googleapis.com/a1aa/image/Vh2QqfRSKw3BISNz7uNv5rlaCijIdYarE0qOJae97Z8QZlvTA.jpg" width="600"/>
      <div className="p-4">
       <h3 className="text-lg font-bold text-gray-800">
        The Dragons Quest
       </h3>
       <p className="text-gray-600">
        An epic tale of a knights journey to slay a dragon and save the kingdom.
       </p>
      </div>
     </div>
     <div className="bg-white shadow-md rounded-lg overflow-hidden">
      <Image alt="Cover image of a sci-fi novel with a spaceship and distant planets" className="w-full h-48 object-cover" height="400" src="https://storage.googleapis.com/a1aa/image/LareB1h5gxzifUyFemfk7mIiuKe0mHeRzIAWaDFL1KAfpsy3JA.jpg" width="600"/>
      <div className="p-4">
       <h3 className="text-lg font-bold text-gray-800">
        Galactic Adventures
       </h3>
       <p className="text-gray-600">
        Join the crew of the Starship Explorer as they navigate the cosmos.
       </p>
      </div>
     </div>
     <div className="bg-white shadow-md rounded-lg overflow-hidden">
      <Image alt="Cover image of a romance novel with a couple holding hands in a sunset" className="w-full h-48 object-cover" height="400" src="https://storage.googleapis.com/a1aa/image/jtcTrzEKLj7mCF0CnkBVRfkXBEaudQMHpQdKHm3C5rInsy3JA.jpg" width="600"/>
      <div className="p-4">
       <h3 className="text-lg font-bold text-gray-800">
        Love in the Sunset
       </h3>
       <p className="text-gray-600">
        A heartwarming story of love and relationships set against beautiful sunsets.
       </p>
      </div>
     </div>
    </div>
   </section>
   <section className="mb-8">
    <h2 className="text-2xl font-bold text-gray-800 mb-4">
     Latest Releases
    </h2>
    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
     <div className="bg-white shadow-md rounded-lg overflow-hidden">
      <Image alt="Cover image of a mystery novel with a detective and a dark alley" className="w-full h-48 object-cover" height="400" src="https://storage.googleapis.com/a1aa/image/JtMXD5lfSkXrQCQZrmaIGdPfo6CgHdIPCT3k0AZ5GrbHZlvTA.jpg" width="600"/>
      <div className="p-4">
       <h3 className="text-lg font-bold text-gray-800">
        The Silent Detective
       </h3>
       <p className="text-gray-600">
        A gripping mystery novel following a detective quest to solve a dark case.
       </p>
      </div>
     </div>
     <div className="bg-white shadow-md rounded-lg overflow-hidden">
      <Image alt="Cover image of a horror novel with a haunted house and a ghost" className="w-full h-48 object-cover" height="400" src="https://storage.googleapis.com/a1aa/image/yf5pEmccb32XEKZUgOHLUEozyTfSmX8vOe7ek458fxmRJr8dC.jpg" width="600"/>
      <div className="p-4">
       <h3 className="text-lg font-bold text-gray-800">
        Haunted Nights
       </h3>
       <p className="text-gray-600">
        Experience the chills and thrills of a haunted house in this horror novel.
       </p>
      </div>
     </div>
     <div className="bg-white shadow-md rounded-lg overflow-hidden">
      <Image alt="Cover image of a historical novel with a medieval castle and knights" className="w-full h-48 object-cover" height="400" src="https://storage.googleapis.com/a1aa/image/8EwRpLfGuQ3DKqNEWwegZyWzpkJuiVo1GRGxf54WWeeSKr8dC.jpg" width="600"/>
      <div className="p-4">
       <h3 className="text-lg font-bold text-gray-800">
        Medieval Chronicles
       </h3>
       <p className="text-gray-600">
        Dive into the history and adventures of medieval times in this novel.
       </p>
      </div>
     </div>
    </div>
   </section>
   <section>
    <h2 className="text-2xl font-bold text-gray-800 mb-4">
     Popular Novels
    </h2>
    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
     <div className="bg-white shadow-md rounded-lg overflow-hidden">
      <Image alt="Cover image of a fantasy novel with a wizard and magical creatures" className="w-full h-48 object-cover" height="400" src="https://storage.googleapis.com/a1aa/image/kSq4Pohodv7UGhHNxE63jd7fISWLSrApLwtqD7hWJClqsy3JA.jpg" width="600"/>
      <div className="p-4">
       <h3 className="text-lg font-bold text-gray-800">
        Wizards Journey
       </h3>
       <p className="text-gray-600">
        Follow the adventures of a wizard in a world filled with magic and wonder.
       </p>
      </div>
     </div>
     <div className="bg-white shadow-md rounded-lg overflow-hidden">
      <Image alt="Cover image of a thriller novel with a spy and a cityscape" className="w-full h-48 object-cover" height="400" src="https://storage.googleapis.com/a1aa/image/BFt1wL2Nu5a5OhQqsZ5mmJ7GvZz6FSOe62tuobtOLdWmsy3JA.jpg" width="600"/>
      <div className="p-4">
       <h3 className="text-lg font-bold text-gray-800">
        Spy in the Shadows
       </h3>
       <p className="text-gray-600">
        A thrilling novel about espionage and intrigue in a bustling city.
       </p>
      </div>
     </div>
     <div className="bg-white shadow-md rounded-lg overflow-hidden">
      <Image alt="Cover image of a drama novel with a family and a countryside" className="w-full h-48 object-cover" height="400" src="https://storage.googleapis.com/a1aa/image/k3U40bU2VmZjN1pAFHwzeGRymgSJSNPXaq1GM5zOIC5nsy3JA.jpg" width="600"/>
      <div className="p-4">
       <h3 className="text-lg font-bold text-gray-800">
        Family Ties
       </h3>
       <p className="text-gray-600">
        A touching drama about family relationships and life in the countryside.
       </p>
      </div>
     </div>
    </div>
   </section>
  </main>
  <footer className="bg-white shadow mt-8">
   <div className="container mx-auto px-6 py-4 flex justify-between items-center">
    <p className="text-gray-800">
     © 2024 WebToon. All rights reserved.
    </p>
    <div className="flex space-x-4">
     <Link className="text-gray-800 hover:text-gray-600" href="#">
      <i className="fab fa-facebook-f">
      </i>
     </Link>
     <Link className="text-gray-800 hover:text-gray-600" href="#">
      <i className="fab fa-twitter">
      </i>
     </Link>
     <a title="nguvaiz" className="text-gray-800 hover:text-gray-600" href="#">
      <i className="fab fa-instagram">
      </i>
     </a>
    </div>
   </div>
      </footer>
      
      
 </body>
    )
}
export default Home;