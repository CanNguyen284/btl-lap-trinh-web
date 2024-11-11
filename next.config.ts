import type { NextConfig } from "next";
module.exports = {
  images: {
    remotePatterns: [
      {
        protocol: 'https',
        hostname: 'storage.googleapis.com',
        port: '', // Leave empty for default port
        pathname: '/**', // Allow all paths
      },
    ],
  },
};
const nextConfig: NextConfig = {
  /* config options here */
};

export default nextConfig;
